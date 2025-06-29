@extends('layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">Admin Chat</h1>

    <div id="admin-messages" class="space-y-3 mb-6 border border-gray-200 p-4 rounded max-h-96 overflow-y-auto bg-white"></div>

    <form id="admin-reply-form" class="flex space-x-2">
        <input id="reply-message" class="flex-1 border px-2 py-1 rounded" placeholder="Reply as admin...">
        <button class="bg-blue-500 text-white px-4 py-1 rounded">Send</button>
    </form>
</div>

<script>
const adminMessages = document.getElementById('admin-messages')
const replyForm = document.getElementById('admin-reply-form')
const replyInput = document.getElementById('reply-message')
let activeMessageId = null

// Fetch messages
function loadMessages() {
    fetch('/admin/messages')
      .then(res => res.json())
      .then(data => {
          adminMessages.innerHTML = ''
          data.forEach(msg => {
              const div = document.createElement('div')
              div.className = 'bg-blue-50 p-3 rounded cursor-pointer'
              div.innerHTML = `<strong>${msg.name || 'Anon'}:</strong> ${msg.message}` + (msg.reply ? `<br><em>Reply: ${msg.reply}</em>` : '')
              div.addEventListener('click', () => { activeMessageId = msg.id })
              adminMessages.appendChild(div)
          })
      })
}
loadMessages()
setInterval(loadMessages, 5000)

// Send reply
replyForm.addEventListener('submit', e => {
    e.preventDefault()
    if (!activeMessageId) return alert('Pilih pesan dulu!')
    fetch(`/admin/messages/${activeMessageId}/reply`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ reply: replyInput.value })
    })
    .then(() => {
        replyInput.value = ''
        loadMessages()
    })
})
</script>
@endsection
