@extends('layouts.auth')

@section('title', 'Register | BookLynk')

@section('content')
<div class="flex min-h-screen">
    
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


        <!-- IMAGE SLOT -->
        <div class="flex justify-center">
            <img 
                src="{{ asset('images/foto-orang.png') }}" 
                alt="Register Illustration"
                class="max-w-md"
            >
        </div>
    </div>

    <!-- RIGHT SECTION -->
    <div class="w-1/2 bg-slate-50 flex items-center justify-center">
        <form 
            method="POST" 
            action="{{ route('register') }}" 
            class="w-[400px] space-y-4"
        >
            @csrf

            <input
                type="text"
                name="name"
                placeholder="Name"
                class="w-full px-4 py-3 rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >

            <input
                type="email"
                name="email"
                placeholder="Email"
                class="w-full px-4 py-3 rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full px-4 py-3 rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                class="w-full px-4 py-3 rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >

            <button
                type="submit"
                class="w-full bg-indigo-900 text-white py-3 rounded-lg font-semibold hover:bg-indigo-800 transition"
            >
                Confirm
            </button>

            <p class="text-sm text-center">
                Have an account?
                <a href="{{ route('login') }}" class="text-indigo-900 font-semibold hover:underline">
                    Login
                </a>
            </p>
        </form>
    </div>

</div>
@endsection
