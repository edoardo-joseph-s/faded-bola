@extends('layouts.app')

@section('content')
<section class="py-[92px] px-[7%] bg-soft max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)] p-[34px] max-w-[760px] mx-auto max-[640px]:p-6 text-center">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Halaman Tidak Ditemukan</span>
        <h1 class="text-[56px] leading-[1.1] mb-4 max-[640px]:text-[32px]">404 - Halaman tidak ditemukan</h1>
        <p class="text-muted text-[17px] leading-[1.7] mb-7">Maaf, halaman yang Anda cari tidak tersedia. Silakan kembali ke beranda atau cek link yang digunakan.</p>
        <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="{{ route('home') }}">Kembali ke Home</a>
    </div>
</section>
@endsection
