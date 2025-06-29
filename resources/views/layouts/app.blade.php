<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jans Fahrel's Personal Website</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 min-h-screen flex flex-col">

    {{-- Nav --}}
    @include('partials.nav')

    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white/70 mt-auto p-4 text-center text-gray-600">
      © {{ date('Y') }} Jans Fahrel. All rights reserved.
    </footer>

    {{-- Floating Chat Button --}}
    <button id="chat-toggle" class="fixed bottom-5 right-5 bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-600 z-50 transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
      </svg>
    </button>

    {{-- Chat Widget --}}
    <!-- Note: `hidden` is present initially; `flex flex-col` will be active when `hidden` is toggled -->
    <div id="chat-widget" class="hidden fixed bottom-20 right-5 w-80 bg-white rounded-xl shadow-xl border border-gray-200 z-50 flex flex-col">
      <div class="bg-blue-500 text-white p-3 flex justify-between items-center rounded-t-xl">
        <h3 class="font-semibold">Chat with me</h3>
        <button id="chat-close">&times;</button>
      </div>
      <div id="chat-messages" class="flex-1 p-3 overflow-y-auto h-64 space-y-2 bg-gray-50"></div>
      <form id="chat-form" class="p-3 flex space-x-2 border-t border-gray-200 bg-white rounded-b-xl">
        <input id="chat-input" class="flex-1 border border-gray-300 rounded px-2 py-1 text-sm" placeholder="Type a message..." required>
        <button class="bg-blue-500 text-white px-3 py-1 rounded">Send</button>
      </form>
    </div>

    {{-- Chat Script --}}
    <script>
      const chatToggle = document.getElementById('chat-toggle')
      const chatWidget = document.getElementById('chat-widget')
      const chatClose = document.getElementById('chat-close')
      const chatMessages = document.getElementById('chat-messages')
      const chatForm = document.getElementById('chat-form')
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

      chatToggle.addEventListener('click', () => chatWidget.classList.toggle('hidden'))
      chatClose.addEventListener('click', () => chatWidget.classList.add('hidden'))

      // Load existing messages
      fetch('/messages')
        .then(res => res.json())
        .then(data => {
          chatMessages.innerHTML = ''
          data.reverse().forEach(msg => {
            chatMessages.innerHTML += `<div class="bg-blue-100 rounded p-2">${msg.message}</div>`
          })
          chatMessages.scrollTop = chatMessages.scrollHeight
        })

      // Submit new message
      chatForm.addEventListener('submit', e => {
        e.preventDefault()
        const msg = document.getElementById('chat-input').value
        fetch('/messages', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify({ message: msg })
        })
        .then(res => res.json())
        .then(() => {
          chatMessages.innerHTML += `<div class="bg-blue-100 rounded p-2">${msg}</div>`
          chatMessages.scrollTop = chatMessages.scrollHeight
          document.getElementById('chat-input').value = ''
        })
      })
    </script>

</body>
</html>
