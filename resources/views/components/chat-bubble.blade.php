<!-- resources/views/components/chat-bubble.blade.php -->
<div id="chat-bubble" class="fixed bottom-4 right-4 bg-blue-600 p-4 rounded-full text-white cursor-pointer shadow-xl hover:bg-blue-500 z-50">💬</div>

<div id="chat-panel" class="hidden fixed bottom-16 right-4 w-80 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-50">
    <h2 class="font-bold mb-2">Chat with Us</h2>
    <div id="chat-messages" class="h-40 overflow-y-auto border p-2 mb-2 text-sm space-y-1"></div>
    <textarea id="chat-input" class="w-full border p-2 rounded mb-2 text-sm" placeholder="Your message..."></textarea>
    <button id="send-btn" class="bg-blue-500 text-white w-full py-1 rounded">Send</button>
</div>

<script>
    const bubble = document.getElementById('chat-bubble');
    const panel = document.getElementById('chat-panel');
    const input = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-btn');
    const messages = document.getElementById('chat-messages');

    bubble.addEventListener('click', () => panel.classList.toggle('hidden'));
    sendButton.addEventListener('click', () => {
        const text = input.value.trim();
        if (!text) return;
        const messageElem = document.createElement('div');
        messageElem.textContent = text;
        messageElem.classList.add('bg-blue-100', 'p-2', 'rounded');
        messages.appendChild(messageElem);
        input.value = '';
        messages.scrollTop = messages.scrollHeight;
    });
</script>
