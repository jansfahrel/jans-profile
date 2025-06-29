<nav class="bg-white/80 backdrop-blur-sm shadow p-4 sticky top-0 z-50 flex justify-between items-center">
  <div class="text-2xl font-bold text-blue-600">Jans Fahrel</div>
  <ul class="flex space-x-8 text-gray-800 font-medium tracking-wide">
    <li><a href="#home" class="hover:text-blue-500">Home</a></li>
    <li><a href="#about" class="hover:text-blue-500">About</a></li>
    <li><a href="#projects" class="hover:text-blue-500">Projects</a></li>
    <li><a href="#contact" class="hover:text-blue-500">Contact</a></li>
  </ul>
</nav>
<a href="{{ auth()->check() && auth()->user()->is_admin ? route('admin.dashboard') : route('admin.login') }}" class="flex items-center space-x-2 hover:opacity-80 transition">
    <img src="/images/laravel-logo.png" alt="Admin Logo" class="w-8 h-8">
    <span class="font-bold text-blue-600">Admin</span>
</a>
