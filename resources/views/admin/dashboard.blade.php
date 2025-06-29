@extends('layouts.app')

@section('content')
<h1>Dashboard Admin</h1>

@foreach ($users as $user)
    <div class="p-4 border mb-4">
        <h2 class="font-bold">{{ $user->name }}</h2>

        @foreach ($user->messages as $msg)
            <div class="mb-2">
                <div><strong>User:</strong> {{ $msg->message }}</div>
                @if ($msg->reply)
                    <div><strong>Admin:</strong> {{ $msg->reply }}</div>
                @else
                    <form method="POST" action="{{ route('admin.messages.reply', $msg->id) }}">
                        @csrf
                        <textarea name="reply" required class="border p-1 w-full"></textarea>
                        <button class="bg-blue-500 text-white px-4 py-1 mt-2">Balas</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endforeach
@endsection
