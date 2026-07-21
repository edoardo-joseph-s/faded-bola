@extends('layouts.app')

@section('content')
<section class="py-[92px] px-[7%] bg-soft flex items-center justify-center min-h-[60vh] max-[640px]:py-[60px] max-[640px]:px-[22px]">
    <div class="text-center">
        <h1 class="text-[48px] leading-[1.1] mb-4 max-md:text-[38px] max-[640px]:text-[30px]">Selamat Datang di WASH WISH WOOSH</h1>
        <p class="text-muted text-[19px] leading-[1.8] mb-8 max-md:text-[17px] max-[640px]:text-[16px]">Layanan cuci dan salon mobil panggilan terpercaya</p>
        <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="{{ route('home') }}">Mulai Sekarang</a>
    </div>
</section>
@endsection
