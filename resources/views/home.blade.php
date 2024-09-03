<x-layout>
    {{-- title adlh data yg dikirimkan dari route,
         setelah diterima di view home, maka selanjutnya
         dikirim ke component lain --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>
        Welcome to home page
    </h1>
</x-layout>