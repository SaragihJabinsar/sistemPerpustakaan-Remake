@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center p-3 bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-800 mb-6">🔐 Login ke Perpustakaan</h2>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium text-sm" for="username">Username</label>
                <input type="text" name="username" id="username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label class="block mb-1 font-medium text-sm" for="password">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white py-2 rounded-md transition">Masuk</button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">Daftar sekarang</a>
        </p>
    </div>
</div>
@endsection
