<!-- resources/views/chatbot.blade.php -->

<div id="chat-history"></div>

<form id="chat-form">
    <input type="text" id="user" class="input-box" placeholder="Nhập tên của bạn...">
    <input type="text" id="question" class="input-box" placeholder="Ask a question...">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <button id="sendBtn" onclick="sendMessage()" class="send-button" type="submit">Gửi</button>
</form>

<script src="{{ asset('js/chatbot.js') }}"></script>
