<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'MyProfile') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    @include('layouts.navigation')
    <main class="py-6">
        {{ $slot }}
    </main>
</body>
</html>
