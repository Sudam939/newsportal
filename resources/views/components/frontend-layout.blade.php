<!DOCTYPE html>
<html lang="en">
@props(['title', 'meta_description', 'meta_keywords'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $meta_description ?? 'Jawaaf News' }}">
    <meta name="keywords" content="{{ $meta_keywords ?? 'Jawaaf News' }}">
    <title>{{ $title ?? 'Jawaaf News Portal' }}</title>
    <meta property="og:title" content="{{ $title ?? 'Jawaaf News Portal' }}">
    <meta property="og:title" content="{{ $title ?? 'Jawaaf News Portal' }}">
    <meta property="og:image" content="">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=66d87486e5d1da0019714099&product=inline-share-buttons&source=platform"
        async="async"></script>
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0"
        nonce="DeMyJXSz"></script>


    <header>
        <x-frontend-topbar />
    </header>

    <main>
        <x-frontend-navbar />
        {{ $slot }}
    </main>

    <footer></footer>
</body>

</html>
