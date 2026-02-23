@extends('layouts.auth')

@section('title', 'Login | BookLynk')

@section('content')
<div class="min-h-screen flex">

  <!-- LEFT SECTION -->
<div class="w-1/2 bg-[#86C5D6] flex flex-col justify-center items-center text-center px-16">
    <h1 class="text-4xl font-semibold mb-2">
        Welcome to
    </h1>

    <h2 class="text-5xl font-extrabold mb-4">
        BookLynk
    </h2>

    <p class="text-gray-700">
        Login to access your account
    </p>

        <!-- IMAGE PLACEHOLDER -->
        <div class="flex justify-center">
            <img 
                src="{{ asset('/images/foto-orang.png') }}" 
                alt="Login Illustration"
                class="max-w-md"
            >
        </div>
    </div>

    <!-- RIGHT SECTION -->
    <div class="w-1/2 bg-slate-50 flex items-center justify-center">
        <div class="w-full max-w-sm">

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full px-4 py-3 rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full px-4 py-3 rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required
                >

                <button
                    type="submit"
                    class="w-full bg-indigo-900 text-white py-3 rounded-lg font-semibold hover:bg-indigo-800 transition"
                >
                    Confirm
                </button>
            </form>

            <p class="text-center text-sm mt-4">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-indigo-700 font-semibold hover:underline">
                    Register
                </a>
            </p>

        </div>
    </div>

</div>
@endsection
