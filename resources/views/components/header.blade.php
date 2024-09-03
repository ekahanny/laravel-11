{{-- Untuk component sederhana, command yang dibutuhkan
     adalah php artisan make: component NamaComponent --view --}}
<div>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{-- variabel slot digunakan utk mengambil apapun yg diisikan di dalam component --}}
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
        </div>
    </header>
</div>