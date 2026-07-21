@extends('layouts.admin')

@section('content')
<main class="min-h-screen flex items-center justify-center px-[5%] bg-[linear-gradient(135deg,#f4f9fc,#fff 48%,#fff7e8)]">
    <div class="w-full max-w-md bg-white border border-line rounded-2xl shadow-[0_26px_80px_rgba(21,35,48,.12)] p-10">
        <div class="text-center mb-8">
            <a class="flex flex-col items-center gap-3 mb-6" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/favicon/www-logo.png') }}" alt="Wash Wish Woosh" class="h-20 w-20 object-contain rounded-2xl">
                <span class="text-ink text-xl font-extrabold tracking-wide">WASH WISH WOOSH</span>
            </a>
            <h1 class="text-ink text-[28px] leading-tight mt-3">Admin Login</h1>
            <p class="text-muted text-sm mt-2">Masukkan username dan password admin untuk mengakses dashboard.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 text-[#5a1010] bg-[#fff1f0] border border-[#fecdca] rounded-lg font-extrabold text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="post">
            @csrf
            <label class="grid gap-2 mb-5">
                <span class="text-ink font-extrabold text-sm">Username</span>
                <input
                    class="w-full min-h-12 py-3 px-4 text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all"
                    type="text"
                    name="username"
                    placeholder="Masukkan username"
                    value="{{ old('username') }}"
                    autofocus
                    required
                >
            </label>
            <label class="grid gap-2 mb-7">
                <span class="text-ink font-extrabold text-sm">Password</span>
                <input
                    class="w-full min-h-12 py-3 px-4 text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </label>
            <button
                class="w-full border-0 cursor-pointer inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all"
                type="submit"
            >Masuk</button>
        </form>
    </div>
</main>
@endsection
