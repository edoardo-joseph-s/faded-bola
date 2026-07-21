@extends('layouts.app')

@section('content')
<section class="py-[92px] px-[7%] bg-soft max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)] p-[34px] max-w-[760px] mx-auto max-[640px]:p-6">
        @if ($saved)
            <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Pesanan Terkirim</span>
            <h1 class="text-[42px] leading-[1.1] mb-4 max-md:text-[36px] max-[640px]:text-[28px]">Terima kasih, {{ $order->nama }}.</h1>
            <p class="text-muted text-[17px] leading-[1.7] mb-7">Pesanan Anda sudah masuk ke sistem Wash Wish Woosh. Customer service akan memeriksa detail berikut dan mengonfirmasi jadwal layanan.</p>
            <dl class="grid grid-cols-2 gap-3.5 mb-7 max-[640px]:grid-cols-1">
                @foreach([['Kode Pesanan',$order->kode],['Layanan',$order->layanan],['Ukuran Mobil',$order->ukuran],['Jadwal',$order->tanggal->format('Y-m-d').' '.$order->jam],['Domisili',$order->domisili],['Estimasi Harga',$order->estimasi_harga],['Status',$order->status]] as [$label,$value])
                <div class="p-[18px] bg-soft border border-line rounded-lg">
                    <dt class="block text-muted text-[13px] font-extrabold uppercase">{{ $label }}</dt>
                    <dd class="block mt-1.5 text-ink leading-[1.35]">{{ $value }}</dd>
                </div>
                @endforeach
            </dl>
            <div class="flex flex-wrap gap-3.5">
                <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="{{ route('home') }}">Kembali ke Home</a>
                <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold text-primary-dark bg-white border border-primary/[.22] hover:text-white hover:bg-primary hover:-translate-y-0.5 transition-all" href="{{ route('reviews.index', ['kode' => $order->kode]) }}">Beri Ulasan Setelah Selesai</a>
            </div>
        @else
            <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Pesanan Belum Terkirim</span>
            <h1 class="text-[42px] leading-[1.1] mb-4 max-md:text-[36px] max-[640px]:text-[28px]">Mohon lengkapi data pesanan.</h1>
            <ul class="mb-7 text-[#5a1010] list-disc list-inside">
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="{{ route('contact') }}">Kembali ke Form</a>
        @endif
    </div>
</section>
@endsection
