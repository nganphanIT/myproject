require('./bootstrap');
function sendMessage() {
    var messageInput = document.getElementById("message-input");
    var message = messageInput.value.trim();

    if (message !== "") {
        // Send message to server (you can use AJAX/fetch here)
        messageInput.value = "";
        var chatMessages = document.getElementById("chat-messages");
        chatMessages.innerHTML += "<div class='message'>You: " + message + "</div>";
        chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll to bottom
    }
}
