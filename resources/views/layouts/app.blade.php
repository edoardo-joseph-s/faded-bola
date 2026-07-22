<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wash Wish Woosh - Jasa cuci dan salon mobil panggilan profesional langsung ke rumah Anda di Jakarta.">
    <title>{{ $title ?? 'WASH WISH WOOSH' }}</title>
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/images/favicon/favicon-48x48.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.navbar')
    <main>@yield('content')</main>
    @include('partials.footer')
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    @isset($scripts)
        @foreach($scripts as $script)
            <script src="{{ asset('assets/js/' . $script) }}"></script>
        @endforeach
    @endisset
</body>
</html>
