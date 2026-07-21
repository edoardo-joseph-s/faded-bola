@extends('layouts.app')

@section('content')
<section class="grid grid-cols-[minmax(0,1fr)_minmax(360px,.82fr)] gap-12 items-center min-h-[680px] pt-[150px] px-[7%] pb-[76px] page-hero max-md:grid-cols-1 max-md:py-[132px] max-md:px-[5%] max-[640px]:py-[126px] max-[640px]:px-[22px]">
    <div class="max-w-[720px]">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Galeri</span>
        <h1 class="max-w-[720px] text-[56px] leading-[1.1] mb-[22px] max-md:text-[42px] max-[640px]:text-[36px]">Detail area mobil yang kami rawat</h1>
        <p class="max-w-[640px] text-muted text-[18px] leading-[1.8] mb-[30px]">Galeri ini menampilkan pilihan layanan Wash Wish Woosh untuk eksterior, interior, kaca, mesin, ban, dan velg.</p>
        <div class="flex gap-4 flex-wrap">
            <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="{{ route('contact') }}">Pesan Layanan</a>
            <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold text-primary-dark bg-white border border-primary/[.22] hover:text-white hover:bg-primary hover:-translate-y-0.5 transition-all" href="{{ route('pricing') }}">Lihat Harga</a>
        </div>
    </div>
    <div class="overflow-hidden rounded-lg border border-line shadow-[0_28px_70px_rgba(21,35,48,.14)]">
        <img class="h-[430px] object-cover max-md:h-[320px] max-[640px]:h-[260px]" src="{{ asset('assets/images/layanan/cuci mobil.jpg') }}" alt="Galeri layanan Wash Wish Woosh" loading="lazy">
    </div>
</section>

<section class="py-[92px] px-[7%] bg-white max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="max-w-[760px] mx-auto mb-12 text-center">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Dokumentasi Layanan</span>
        <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Perawatan untuk setiap sudut mobil</h2>
        <p class="text-muted text-[17px] leading-[1.7]">Pilih layanan sesuai area yang ingin dibersihkan dan kondisi kendaraan Anda.</p>
    </div>
    <div class="grid grid-cols-3 gap-[18px] max-[1060px]:grid-cols-2 max-[640px]:grid-cols-1">
        @foreach(App\Models\Service::all() as $service)
            <figure class="overflow-hidden relative min-h-[260px] rounded-lg bg-[#d8eef8] shadow-[0_18px_45px_rgba(21,35,48,.08)]">
                <img class="h-full min-h-[260px] object-cover" src="{{ asset($service['image']) }}" alt="{{ $service['image_alt'] }}" loading="lazy">
                <figcaption class="absolute left-[14px] right-[14px] bottom-[14px] py-3 px-[14px] text-white bg-[rgba(16,24,32,.78)] rounded-lg font-extrabold">{{ $service['eyebrow'] }}</figcaption>
            </figure>
        @endforeach
    </div>
</section>
@endsection
