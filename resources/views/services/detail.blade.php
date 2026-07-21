@extends('layouts.app')

@section('content')
    <section class="grid grid-cols-[minmax(0,1fr)_minmax(360px,.82fr)] gap-12 items-center min-h-[680px] pt-[150px] px-[7%] pb-[76px] page-hero max-md:grid-cols-1 max-md:py-[132px] max-md:px-[5%] max-[640px]:py-[126px] max-[640px]:px-[22px]">
        <div class="max-w-[720px]">
            <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">{{ $service['eyebrow'] }}</span>
            <h1 class="max-w-[720px] text-[56px] leading-[1.1] mb-[22px] max-md:text-[42px] max-[640px]:text-[36px]">{{ $service['title'] }}</h1>
            <p class="max-w-[640px] text-muted text-[18px] leading-[1.8] mb-[30px]">{{ $service['description'] }}</p>
            <div class="flex gap-4 flex-wrap">
                <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="{{ route('contact', ['layanan' => $service['title']]) }}">Pesan Sekarang</a>
                <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold text-primary-dark bg-white border border-primary/[.22] hover:text-white hover:bg-primary hover:-translate-y-0.5 transition-all" href="{{ route('pricing') }}">Lihat Harga Lain</a>
            </div>
        </div>
        <div class="overflow-hidden rounded-lg border border-line shadow-[0_28px_70px_rgba(21,35,48,.14)]">
            <img class="h-[430px] object-cover max-md:h-[320px] max-[640px]:h-[260px]" src="{{ asset($service['image']) }}" alt="{{ $service['image_alt'] }}" loading="lazy">
        </div>
    </section>

    <section class="py-[92px] px-[7%] bg-soft max-[640px]:py-[70px] max-[640px]:px-[22px]">
        <div class="max-w-[760px] mx-auto mb-12 text-center">
            <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Mengapa Pilih Paket Ini?</span>
            <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Fitur Utama Layanan</h2>
            <p class="text-muted text-[17px] leading-[1.7]">Setiap paket dirancang untuk menghadirkan hasil maksimal tanpa merusak cat atau interior kendaraan.</p>
        </div>
        <div class="grid grid-cols-2 gap-[18px] max-w-[980px] mx-auto max-md:grid-cols-1">
            @foreach($service['features'] as $feature)
                <div class="flex gap-3.5 items-start p-[22px] bg-white border border-line rounded-lg shadow-[0_16px_40px_rgba(21,35,48,.05)]">
                    <span class="w-3 h-3 shrink-0 mt-[7px] rounded-full bg-accent"></span>
                    <p class="text-muted leading-[1.7]">{{ $feature }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-[92px] px-[7%] bg-white max-[640px]:py-[70px] max-[640px]:px-[22px]">
        <div class="max-w-[760px] mx-auto mb-12 text-center">
            <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Pilihan Ukuran</span>
            <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Harga Layanan</h2>
            <p class="text-muted text-[17px] leading-[1.7]">Pilih ukuran kendaraan sesuai jenis dan kebutuhan servis Anda.</p>
        </div>
        <div class="grid grid-cols-3 gap-6 max-[1060px]:grid-cols-2 max-[640px]:grid-cols-1">
            @foreach($service['prices'] as $price)
                <div class="flex flex-col justify-between min-h-[360px] p-[30px] bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)]">
                    <div>
                        <span class="inline-flex py-2 px-3 mb-[18px] text-primary-dark bg-primary/10 rounded-full text-[13px] font-extrabold uppercase">{{ $price['size'] }}</span>
                        <h3 class="text-2xl mb-3">{{ $price['label'] }}</h3>
                        <p class="min-h-[58px] text-muted leading-[1.7]">{{ $price['cars'] }}</p>
                    </div>
                    <div class="my-6 pt-[22px] border-t border-line">
                        <span class="block text-muted text-sm mb-2">Harga estimasi</span>
                        <strong class="block text-ink text-[32px] leading-[1.15]">{{ $price['price'] }}</strong>
                    </div>
                    <a class="inline-flex items-center justify-center min-h-12 px-5 text-white bg-primary rounded-lg font-extrabold hover:bg-primary-dark hover:-translate-y-0.5 transition-all" href="{{ route('contact', ['layanan' => $service['title'], 'ukuran' => $price['value']]) }}">Pesan Paket</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
