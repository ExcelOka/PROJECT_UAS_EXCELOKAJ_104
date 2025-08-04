@extends('layouts.app')

@section('content')
    {{-- Judul Utama untuk Makanan --}}
    <div class="text-center mb-10">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800">Pilihan Menu Katering</h1>
        <p class="mt-2 text-lg text-gray-500">Pilih menu satuan sesuai selera Anda.</p>
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
            <p class="col-span-full text-center text-gray-500 text-lg py-16">Belum ada data makanan yang tersedia.</p>
        @endforelse
    </div>

    {{-- Pemisah Visual antar Bagian --}}
    <div class="my-20 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800">Pilihan Paket Katering</h2>
        <p class="mt-2 text-lg text-gray-500">Solusi lengkap dan praktis untuk acara spesial Anda.</p>
    </div>

    {{-- Grid untuk Paket (DENGAN GRADASI YANG DISAMAKAN) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($pakets as $paket)
            <a href="{{ route('paket.detail', $paket->id) }}" class="block group">
                 {{-- Mengganti gradasi menjadi ungu-indigo agar serasi --}}
                <div class="bg-gradient-to-br from-purple-600 to-indigo-800 text-white rounded-2xl shadow-lg p-6 flex flex-col h-full transform transition-transform duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                    <div class="flex-grow">
                        <h2 class="text-2xl font-bold mb-2">{{ $paket->nama }}</h2>
                        <p class="text-indigo-200 text-sm">
                            {{ Str::limit(strip_tags($paket->deskripsi), 90) }}
                        </p>
                    </div>
                    {{-- Menyesuaikan gaya harga agar konsisten --}}
                    <p class="text-indigo-200 text-sm mt-4 pt-4 border-t border-white border-opacity-20">
                        Harga paket: 
                        <span class="block text-xl font-semibold text-yellow-300">
                            Rp{{ number_format($paket->harga, 0, ',', '.') }}
                        </span>
                    </p>
                </div>
            </a>
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg py-16">Belum ada data paket yang tersedia.</p>
        @endforelse
    </div>
@endsection