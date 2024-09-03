<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        
        {{-- memanggil component dengan nama navbar dan header --}}
        <x-navbar></x-navbar>
        {{-- variabel title berasal dari route kemudian dikirim dari component (home, blog, dll) --}}
        <x-header>{{ $title }}</x-header>



        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>
        </main>
    </div>

</body>

</html>