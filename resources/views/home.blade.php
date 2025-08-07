@extends('layouts.app')

@section('content')
    {{-- Form Pencarian --}}
    <div class="mb-10 text-center">
        <form action="{{ route('home') }}" method="GET" class="inline-flex gap-2">
            <input
                type="text"
                name="search"
                placeholder="Cari makanan atau paket..."
                value="{{ request('search') }}"
                class="border border-gray-300 rounded-lg px-4 py-2 w-72 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
            <button
                type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition"
            >
                Cari
            </button>
        </form>
    </div>

    {{-- Judul Utama untuk Makanan --}}
    <div class="text-center mb-10">
        @if(isset($search) && $search != '')
            <h2 class="text-3xl font-semibold text-gray-700 mb-2">Hasil Pencarian Makanan</h2>
        @else
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800">Pilihan Menu Katering</h1>
            <p class="mt-2 text-lg text-gray-500">Pilih menu satuan sesuai selera Anda.</p>
        @endif
    </div>

    {{-- Grid untuk Makanan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($food as $food)
            <a href="{{ route('food.detail', $food->id) }}" class="block group">
                <div class="bg-gradient-to-br from-purple-600 to-indigo-800 text-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col transform transition-transform duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                    @if ($food->foto)
                        <img src="{{ asset('storage/' . $food->foto) }}" alt="{{ $food->nama }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-black bg-opacity-25 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif

                    <div class="p-6 flex-grow flex flex-col">
                        <h2 class="text-2xl font-bold text-white mb-2">{{ $food->nama }}</h2>
                        <div class="flex-grow"></div> {{-- Spacer --}}
                        <p class="text-indigo-200 text-sm mt-2">
                            Mulai dari:
                            <span class="text-xl font-semibold text-yellow-300">Rp{{ number_format($food->harga_per_orang, 0, ',', '.') }}</span> / orang
                        </p>
                    </div>
                </div>
            </a>
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg py-16">
                @if(isset($search) && $search != '')
                    Tidak ada makanan ditemukan untuk: <strong>{{ $search }}</strong>
                @else
                    Belum ada data makanan yang tersedia.
                @endif
            </p>
        @endforelse
    </div>

    {{-- Pemisah Visual antar Bagian --}}
    <div class="my-20 text-center">
        @if(isset($search) && $search != '')
            <h2 class="text-3xl font-semibold text-gray-700 mb-2">Hasil Pencarian Paket Katering</h2>
        @else
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800">Pilihan Paket Katering</h2>
            <p class="mt-2 text-lg text-gray-500">Solusi lengkap dan praktis untuk acara spesial Anda.</p>
        @endif
    </div>

    {{-- Grid untuk Paket --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($pakets as $paket)
            <a href="{{ route('paket.detail', $paket->id) }}" class="block group">
                <div class="bg-gradient-to-br from-purple-600 to-indigo-800 text-white rounded-2xl shadow-lg p-6 flex flex-col h-full transform transition-transform duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                    <div class="flex-grow">
                        <h2 class="text-2xl font-bold mb-2">{{ $paket->nama }}</h2>
                        <p class="text-indigo-200 text-sm">
                            {{ Str::limit(strip_tags($paket->deskripsi), 90) }}
                        </p>
                    </div>
                    <p class="text-indigo-200 text-sm mt-4 pt-4 border-t border-white border-opacity-20">
                        Harga paket:
                        <span class="block text-xl font-semibold text-yellow-300">
                            Rp{{ number_format($paket->harga, 0, ',', '.') }}
                        </span>
                    </p>
                </div>
            </a>
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg py-16">
                @if(isset($search) && $search != '')
                    Tidak ada paket ditemukan untuk: <strong>{{ $search }}</strong>
                @else
                    Belum ada data paket yang tersedia.
                @endif
            </p>
        @endforelse
    </div>
@endsection
