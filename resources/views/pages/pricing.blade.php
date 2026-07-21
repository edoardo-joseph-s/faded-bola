@extends('layouts.app')

@section('content')
<section class="grid grid-cols-[minmax(0,1fr)_minmax(360px,.82fr)] gap-12 items-center min-h-[680px] pt-[150px] px-[7%] pb-[76px] page-hero max-md:grid-cols-1 max-md:py-[132px] max-md:px-[5%] max-[640px]:py-[126px] max-[640px]:px-[22px]">
    <div class="max-w-[720px]">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Harga</span>
        <h1 class="max-w-[720px] text-[56px] leading-[1.1] mb-[22px] max-md:text-[42px] max-[640px]:text-[36px]">Harga jelas untuk setiap ukuran mobil</h1>
        <p class="max-w-[640px] text-muted text-[18px] leading-[1.8] mb-[30px]">Pilih layanan dan ukuran kendaraan sebelum mengirim form pesanan. Customer service akan membantu konfirmasi detail jadwal dan alamat pengerjaan.</p>
        <div class="flex gap-4 flex-wrap">
            <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold text-primary-dark bg-white border border-primary/[.22] hover:text-white hover:bg-primary hover:-translate-y-0.5 transition-all" href="{{ route('home') }}#paket">Lihat Layanan</a>
        </div>
    </div>
    <div class="overflow-hidden rounded-lg border border-line shadow-[0_28px_70px_rgba(21,35,48,.14)]">
        <img class="h-[430px] object-cover max-md:h-[320px] max-[640px]:h-[260px]" src="{{ asset('assets/images/layanan/cuci mobil.jpg') }}" alt="Harga layanan cuci mobil" loading="lazy">
    </div>
</section>

<section class="py-[92px] px-[7%] bg-soft max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="max-w-[760px] mx-auto mb-12 text-center">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Ringkasan</span>
        <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Harga cuci mobil interior &amp; eksterior</h2>
        <p class="text-muted text-[17px] leading-[1.7]">Small untuk city car, Medium untuk sedan atau compact SUV, dan Large untuk SUV atau MPV besar.</p>
    </div>
    <div class="grid grid-cols-3 gap-6 max-[1060px]:grid-cols-2 max-[640px]:grid-cols-1">
        @foreach($services['cuci']['prices'] as $price)
            <article class="flex flex-col justify-between min-h-[360px] p-[30px] bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)]">
                <div>
                    <span class="inline-flex py-2 px-3 mb-[18px] text-primary-dark bg-primary/10 rounded-full text-[13px] font-extrabold uppercase">{{ $price['size'] }}</span>
                    <h3 class="text-2xl mb-3">{{ $price['label'] }}</h3>
                    <p class="min-h-[58px] text-muted leading-[1.7]">{{ $price['cars'] }}</p>
                </div>
                <div class="my-6 pt-[22px] border-t border-line">
                    <span class="block text-muted text-sm mb-2">Harga cuci interior &amp; eksterior</span>
                    <strong class="block text-ink text-[32px] leading-[1.15]">{{ $price['price'] }}</strong>
                </div>
                <a class="inline-flex items-center justify-center min-h-12 px-5 text-white bg-primary rounded-lg font-extrabold hover:bg-primary-dark hover:-translate-y-0.5 transition-all" href="{{ route('services.cuci') }}">Lihat Detail</a>
            </article>
        @endforeach
    </div>
</section>

<section class="py-[92px] px-[7%] bg-white max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="max-w-[760px] mx-auto mb-12 text-center">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Semua Layanan</span>
        <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Daftar harga lengkap</h2>
        <p class="text-muted text-[17px] leading-[1.7]">Harga berikut menjadi acuan pemesanan awal melalui website.</p>
    </div>
    <div class="overflow-x-auto border border-line rounded-lg bg-white shadow-[0_18px_45px_rgba(21,35,48,.08)]">
        <table class="w-full border-collapse min-w-[720px]">
            <thead><tr>
                <th class="text-white bg-[#101820] text-[15px] py-[18px] px-5 text-left border-b border-line">Layanan</th>
                <th class="text-white bg-[#101820] text-[15px] py-[18px] px-5 text-left border-b border-line">Small</th>
                <th class="text-white bg-[#101820] text-[15px] py-[18px] px-5 text-left border-b border-line">Medium</th>
                <th class="text-white bg-[#101820] text-[15px] py-[18px] px-5 text-left border-b border-line">Large</th>
            </tr></thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td class="py-[18px] px-5 text-left border-b border-line font-extrabold">{{ $service['title'] }}</td>
                        @foreach($service['prices'] as $price)
                            <td class="py-[18px] px-5 text-left border-b border-line">{{ $price['price'] }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
