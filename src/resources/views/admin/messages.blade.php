<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chattle | Admin</title>
    <link rel="stylesheet" href="{{ asset('css/chattle_admin.min.css') }}">
</head>
<body data-theme="indigo">
    <div class="app-container">
        <div class="app-left">
            <div class="app-left-header">
                <div class="app-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <defs />
                        <path class="path-1" fill="#3eb798"
                            d="M448 193.108h-32v80c0 44.176-35.824 80-80 80H192v32c0 35.344 28.656 64 64 64h96l69.76 58.08c6.784 5.648 16.88 4.736 22.528-2.048A16.035 16.035 0 00448 494.868v-45.76c35.344 0 64-28.656 64-64v-128c0-35.344-28.656-64-64-64z"
                            opacity=".4" />
                        <path class="path-2" fill="#3eb798"
                            d="M320 1.108H64c-35.344 0-64 28.656-64 64v192c0 35.344 28.656 64 64 64v61.28c0 8.832 7.168 16 16 16a16 16 0 0010.4-3.84l85.6-73.44h144c35.344 0 64-28.656 64-64v-192c0-35.344-28.656-64-64-64zm-201.44 182.56a22.555 22.555 0 01-4.8 4 35.515 35.515 0 01-5.44 3.04 42.555 42.555 0 01-6.08 1.76 28.204 28.204 0 01-6.24.64c-17.68 0-32-14.32-32-32-.336-17.664 13.712-32.272 31.376-32.608 2.304-.048 4.608.16 6.864.608a42.555 42.555 0 016.08 1.76c1.936.8 3.76 1.808 5.44 3.04a27.78 27.78 0 014.8 3.84 32.028 32.028 0 019.44 23.36 31.935 31.935 0 01-9.44 22.56zm96 0a31.935 31.935 0 01-22.56 9.44c-2.08.24-4.16.24-6.24 0a42.555 42.555 0 01-6.08-1.76 35.515 35.515 0 01-5.44-3.04 29.053 29.053 0 01-4.96-4 32.006 32.006 0 01-9.28-23.2 27.13 27.13 0 010-6.24 42.555 42.555 0 011.76-6.08c.8-1.936 1.808-3.76 3.04-5.44a37.305 37.305 0 013.84-4.96 37.305 37.305 0 014.96-3.84 25.881 25.881 0 015.44-3.04 42.017 42.017 0 016.72-2.4c17.328-3.456 34.176 7.808 37.632 25.136.448 2.256.656 4.56.608 6.864 0 8.448-3.328 16.56-9.28 22.56h-.16zm96 0a22.555 22.555 0 01-4.8 4 35.515 35.515 0 01-5.44 3.04 42.555 42.555 0 01-6.08 1.76 28.204 28.204 0 01-6.24.64c-17.68 0-32-14.32-32-32-.336-17.664 13.712-32.272 31.376-32.608 2.304-.048 4.608.16 6.864.608a42.555 42.555 0 016.08 1.76c1.936.8 3.76 1.808 5.44 3.04a27.78 27.78 0 014.8 3.84 32.028 32.028 0 019.44 23.36 31.935 31.935 0 01-9.44 22.56z" />
                    </svg>
                </div>
                <h1>Customer Support Chat</h1>
            </div>
            {{-- <div class="app-profile-box">
                <img style="margin: 15px 0px" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2250&q=80"
                    alt="profile">
                <div class="app-profile-box-name">
                    Hello Mahri!
                </div>
            </div> --}}
            <div class="chat-list-wrapper">
                <ul id="chat-list" class="chat-list">
                    @foreach ($chats as $chat)
                        <li onclick="fetchData(this)" class="chat-list-item" id="{{ $chat->id }}" data-sender-name="{{ $chat->name }}">
                            <span class="chat-list-name">{{ $chat->name }} ({{ $chat->email }})</span>
                            @if ($chat->unseen_messages()->count() > 0)
                                <div class="badge">
                                    {{ $chat->unseen_messages()->count() }}
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
                <button id="loading" class="load-more-btn">
                    Load more
                </button>
            </div>
        </div>
        <form id="messageForm" style="width: 100%">
            <div class="app-main">
                <div id="messagesContainer" class="chat-wrapper"></div>
                <div class="chat-input-wrapper">
                    <div class="input-wrapper">
                        <input type="hidden" id="chat_id" value="">
                        <input type="text" id="message" class="chat-input" placeholder="Enter your message here">
                    </div>
                    <button class="chat-send-btn" type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
    <script src="/js/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="/js/chattle_admin.js"></script>
</body>

</html>
