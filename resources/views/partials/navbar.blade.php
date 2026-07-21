@php use App\Models\Service; @endphp
<nav class="navbar w-full min-h-[86px] flex items-center justify-between gap-7 px-[7%] bg-white/95 border-b border-ink/[.06] shadow-[0_12px_35px_rgba(21,35,48,.08)] backdrop-blur-[12px] fixed top-0 z-[999] max-[860px]:min-h-[76px] max-[860px]:px-[5%]">
    <a class="flex items-center gap-2 whitespace-nowrap" href="{{ route('home') }}">
        <img src="{{ asset('assets/images/favicon/www-logo.png') }}" alt="Wash Wish Woosh" class="h-16 w-16 object-contain rounded-2xl">
        <span class="text-xl font-extrabold text-ink max-[860px]:text-lg">WASH WISH WOOSH</span>
    </a>

    <button class="hamburger hidden ml-auto w-[46px] h-[46px] items-center justify-center flex-col gap-[6px] border border-ink/[.12] rounded-lg bg-white cursor-pointer max-[860px]:inline-flex" type="button" aria-label="Buka menu navigasi" aria-controls="nav-menu" aria-expanded="false">
        <span class="w-[22px] h-[2px] bg-ink rounded-full"></span>
        <span class="w-[22px] h-[2px] bg-ink rounded-full"></span>
        <span class="w-[22px] h-[2px] bg-ink rounded-full"></span>
    </button>

    <div class="nav-panel flex items-center justify-between flex-1 gap-7 max-[860px]:fixed max-[860px]:top-[calc(100%+10px)] max-[860px]:left-[5%] max-[860px]:right-[5%] max-[860px]:flex-col max-[860px]:gap-[18px] max-[860px]:p-[22px] max-[860px]:bg-white max-[860px]:border max-[860px]:border-line max-[860px]:rounded-lg max-[860px]:shadow-[0_22px_55px_rgba(21,35,48,.16)] max-[860px]:opacity-0 max-[860px]:invisible max-[860px]:-translate-y-3 max-[860px]:pointer-events-none max-[860px]:transition-all duration-300" id="nav-menu">
        <ul class="flex items-center justify-center flex-1 list-none gap-[30px] max-[860px]:w-full max-[860px]:flex-col max-[860px]:gap-1">
            <li><a class="text-ink text-[15px] font-bold hover:text-primary transition-colors max-[860px]:block max-[860px]:px-3 max-[860px]:py-[14px] max-[860px]:rounded-lg max-[860px]:hover:bg-primary/[.08]" href="{{ route('home') }}">Home</a></li>
            <li class="menu-item-has-children relative">
                <a class="dropdown-toggle text-ink text-[15px] font-bold hover:text-primary transition-colors max-[860px]:block max-[860px]:px-3 max-[860px]:py-[14px] max-[860px]:rounded-lg max-[860px]:hover:bg-primary/[.08]" href="#">Layanan</a>
                <ul class="sub-menu list-none absolute top-full left-0 min-w-[240px] py-2 mt-3 bg-white border border-line rounded-xl shadow-[0_18px_40px_rgba(21,35,48,.12)] opacity-0 invisible -translate-y-1.5 pointer-events-none transition-all duration-300 max-[860px]:static max-[860px]:min-w-0 max-[860px]:mt-0 max-[860px]:py-0 max-[860px]:pl-4 max-[860px]:border-0 max-[860px]:shadow-none max-[860px]:opacity-100 max-[860px]:visible max-[860px]:translate-y-0 max-[860px]:pointer-events-auto max-[860px]:hidden">
                    @foreach(Service::all() as $slug => $svc)
                        <li><a class="block py-3 px-5 text-sm font-semibold text-ink hover:bg-primary/[.08] hover:text-primary transition-colors max-[860px]:py-[10px] max-[860px]:px-3" href="{{ route('services.' . $slug) }}">{{ $svc['title'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a class="text-ink text-[15px] font-bold hover:text-primary transition-colors max-[860px]:block max-[860px]:px-3 max-[860px]:py-[14px] max-[860px]:rounded-lg max-[860px]:hover:bg-primary/[.08]" href="{{ route('gallery') }}">Galeri</a></li>
            <li><a class="text-ink text-[15px] font-bold hover:text-primary transition-colors max-[860px]:block max-[860px]:px-3 max-[860px]:py-[14px] max-[860px]:rounded-lg max-[860px]:hover:bg-primary/[.08]" href="{{ route('pricing') }}">Harga</a></li>
            <li><a class="text-ink text-[15px] font-bold hover:text-primary transition-colors max-[860px]:block max-[860px]:px-3 max-[860px]:py-[14px] max-[860px]:rounded-lg max-[860px]:hover:bg-primary/[.08]" href="{{ route('about') }}">Tentang Kami</a></li>
        </ul>
        <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all max-[860px]:w-full" href="{{ route('home') }}#paket">Pesan Sekarang</a>
    </div>
</nav>
