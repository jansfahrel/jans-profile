<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-xl shadow-xl w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Admin Login</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email" class="w-full border px-3 py-2 rounded" required>
            <input type="password" name="password" placeholder="Password" class="w-full border px-3 py-2 rounded" required>
            <button class="bg-blue-500 text-white w-full py-2 rounded hover:bg-blue-600">Login as Admin</button>
        </form>
    </div>
</body>
</html>
