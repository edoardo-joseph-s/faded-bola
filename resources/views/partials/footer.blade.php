<footer class="bg-[#101820] text-white pt-[70px]">
    <div class="w-full grid grid-cols-[1.5fr_.8fr_1fr_1fr] gap-10 px-[7%] pb-[54px] max-[1060px]:grid-cols-2 max-[640px]:grid-cols-1">
        <div>
            <a class="flex items-center gap-2 mb-[18px]" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/favicon/www-logo.png') }}" alt="Wash Wish Woosh" class="h-20 w-auto object-contain">
                <span class="text-primary text-xl font-extrabold">Wash Wish Woosh</span>
            </a>
            <p class="text-white/70 leading-[1.8]">Jasa cuci dan salon mobil profesional dengan pelayanan terbaik langsung ke rumah Anda.</p>
        </div>
        <div>
            <h3 class="mb-[18px] text-xl">Menu</h3>
            <ul class="list-none">
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('home') }}">Home</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('about') }}">Tentang Kami</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('home') }}#paket">Layanan</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('gallery') }}">Galeri</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('pricing') }}">Harga</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('home') }}#paket">Pesan</a></li>
            </ul>
        </div>
        <div>
            <h3 class="mb-[18px] text-xl">Layanan</h3>
            <ul class="list-none">
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('services.cuci') }}">Cuci Mobil Interior & Eksterior</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('services.interior') }}">Salon Mobil Interior</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('services.eksterior') }}">Salon Mobil Eksterior</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('services.kaca') }}">Salon Mobil Kaca</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('services.mesin') }}">Salon Mobil Mesin</a></li>
                <li class="mb-[10px]"><a class="text-white/70 hover:text-accent transition-colors" href="{{ route('services.ban') }}">Salon Mobil Ban & Velg</a></li>
            </ul>
        </div>
        <div>
            <h3 class="mb-[18px] text-xl">Kontak</h3>
            <p class="text-white/70 leading-[1.8]">Wash Wish Woosh - Layanan Cuci & Salon Mobil: 08.00 - 17.00 WIB</p>
            <p class="text-white/70 leading-[1.8]">Email: washwishwoosh@gmail.com</p>
            <p class="text-white/70 leading-[1.8]">Jakarta Utara, Barat, Timur, dan Selatan</p>
        </div>
    </div>
    <div class="text-center py-6 border-t border-white/10 text-white/60">
        <p>&copy; {{ date('Y') }} Wash Wish Woosh. All Rights Reserved.</p>
    </div>
</footer>
