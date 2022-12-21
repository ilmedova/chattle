<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Welcome to chat!</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('/css/chattle_style.css') }}">

<div class="right-side">
    <button class="chat-button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
        </svg>
    </button>
    {{-- CHAT HTML SNIPPET START --}}
    <div class="chat-container" style="display: none">
        <div class="chat-header" style="display: flex">
            <div style="width: 90%">
                <h3>Chat with consultant</h3>
            </div>
            <div style="width: 10%">
                <button class="close-button" style="float: right; margin-top:12px">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="chatContactContainer" class="chat-area" style="display:none">
            <form id="contactForm">
                <div class="chat-typing-area">
                    <input name="name" type="text" placeholder="John Doe" class="form-input" id="name">
                </div>
                <br>
                <div class="chat-typing-area">
                    <input name="email" type="text" placeholder="email@gmail.com" class="form-input" id="email">
                </div>
                <br>
                <button class="submit-button">
                    Submit
                </button>
            </form>
        </div>
        <div id="messagesContainer" class="chat-area" style="display:none">
            <div class="message-wrapper">
                <div class="profile-picture">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="message-content">
                    <p class="name">Admin</p>
                    <div class="message">Hello! Can I help you?</div>
                </div>
            </div>
        </div>
        <div id="inputContainer" class="chat-typing-area-wrapper">
            <form id="messageForm">
                <div class="chat-typing-area">
                    <input type="text" id="message" placeholder="Type your meesage..." class="chat-input">
                    <button class="send-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- CHAT HTML SNIPPET END --}}
</div>

<script src="/js/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="/js/jquery-cookie.js"></script>
<script src="/js/chattle_customer.js"></script>
