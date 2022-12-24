const pusher = new Pusher('qwerty12345', {
    wsHost: '127.0.0.1',
    wsPort: 6001,
    wssPort: 6001,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
    cluster: 'mt1',
});
var chats_update_channel = pusher.subscribe('chats-update');
chats_update_channel.bind('chats', function (response) {
    $('#chat-list').empty();
    console.log(response);
    for(var i=0; i<response.chats.data.length; i++){
        if(response.chats.data[i].unseen_messages_count > 0){
            $('#chat-list').append('<li onclick="fetchData(this)" class="chat-list-item" id="' + response.chats.data[i].id + '" data-sender-name="' + response.chats.data[i].name + '"><span class="chat-list-name">' + response.chats.data[i].name + ' (' + response.chats.data[i].email + ')</span><div class="badge">' + response.chats.data[i].unseen_messages_count + '</div>');
        }
        else{
            $('#chat-list').append('<li onclick="fetchData(this)" class="chat-list-item" id="' + response.chats.data[i].id + '" data-sender-name="' + response.chats.data[i].name + '"><span class="chat-list-name">' + response.chats.data[i].name + ' (' + response.chats.data[i].email + ')</span>');
        }
    }
});
var prevchat_id = 0;
var channel;
function fetchData(elem){
    $('.chat-list-item').removeClass('active');
    var url = '/chattle/get-messages';
    $.get(url, {chat_id: $(elem).attr('id')}, function(response) {
        $('#messagesContainer').empty();
        for(var i=0; i < response.length; i++){
            if(response[i].sender == 'admin'){
                $('#messagesContainer').append('<div class="message-wrapper reverse"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">Admin</p><div class="message">' + response[i].message + '</div></div></div>');
            }
            else{
                $('#messagesContainer').append('<div class="message-wrapper"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">' + $(elem).attr('data-sender-name') + '</p><div class="message">' + response[i].message + '</div></div></div>');
            }
        }
        $('#messagesContainer').finish().animate({
            scrollTop: $('#messagesContainer').prop("scrollHeight")
        }, 250);
    });
    $('#chat_id').val($(elem).attr('id'));
    $(elem).addClass('active');

    if(prevchat_id != 0){
        channel.unbind('my-messages');
        pusher.unsubscribe(prevchat_id);
        console.log(pusher.allChannels());
    }
    channel = pusher.subscribe('chat'+ $(elem).attr('id'));
    channel.bind('my-messages', function (response) {
        console.log('subscribed to: chat' + $(elem).attr('id'));
        if(response.message.sender == 'admin'){
            $('#messagesContainer').append('<div class="message-wrapper reverse"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">Admin</p><div class="message">' + response.message.message + '</div></div></div>');
        }
        else{
            $('#messagesContainer').append('<div class="message-wrapper"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">' + $(elem).attr('data-sender-name') + '</p><div class="message">' + response.message.message + '</div></div></div>');
        }
        $('#messagesContainer').finish().animate({
            scrollTop: $('#messagesContainer').prop("scrollHeight")
        }, 250);
    });
    prevchat_id = $(elem).attr('id');
    pusher.allChannels().forEach(channel => console.log(channel.name));
}

function loadMore(page) {
    $("#loading").html('Loading...').show();
    var url = '/chattle/get-chats';
    $.get(url, {page: page}, function(response) {
        console.log(response.data);
        $("#loading").html('Load more').show();
        for(var i=0; i<response.data.length; i++){
            if(response.data[i].unseen_messages > 0){
                $('#chat-list').append('<li onclick="fetchData(this)" class="chat-list-item" id="' + response.data[i].id + '" data-sender-name="' + response.data[i].name + '"><span class="chat-list-name">' + response.data[i].name + ' (' + response.data[i].email + ')</span><div class="badge">' + response.data[i].unseen_messages + '</div>');
            }
            else{
                $('#chat-list').append('<li onclick="fetchData(this)" class="chat-list-item" id="' + response.data[i].id + '" data-sender-name="' + response.data[i].name + '"><span class="chat-list-name">' + response.data[i].name + ' (' + response.data[i].email + ')</span>');
            }
        }
    });
}
var currPage = 1;
$("#loading").on('click', function() {
    console.log('clicked');
    loadMore(++currPage);
});
$("#messageForm").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/chattle/post-message",
        data: {
            'message': $('#message').val(),
            'chat_id': $('#chat_id').val(),
            'sender': 'admin'
        },
        cache: false,
        success: function (response) {
            $('#message').val("");
            $('#messagesContainer').finish().animate({
                scrollTop: $('#messagesContainer').prop("scrollHeight")
            }, 250);
        }
    });
});
