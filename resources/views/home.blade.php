@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Makanan Katering</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($food as $food)
            <a href="{{ route('food.detail', $food->id) }}" class="block">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    @if ($food->foto)
                        <img src="{{ asset('storage/' . $food->foto) }}" alt="{{ $food->nama }}" class="w-full h-48 object-cover object-center">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image Available
                        </div>
                    @endif
                    <div class="p-5">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $food->nama }}</h2>
                        <p class="text-gray-600 text-sm">
                            Harga Mulai: Rp{{ number_format($food->harga_per_orang, 0, ',', '.') }} / orang
                        </p>
                    </div>
                </div>
            </a>
        @empty
            <p class="col-span-full text-center text-gray-600 text-lg">Belum ada data food yang tersedia.</p>
        @endforelse
    </div>

    <hr class="my-16 border-t-4 border-dashed border-gray-300"> <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Paket Katering Spesial</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($pakets as $paket)
            <a href="{{ route('paket.detail', $paket->id) }}" class="block">
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl p-6 flex flex-col justify-between h-48">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $paket->nama }}</h2>
                        <p class="text-md opacity-90 truncate">{{ Str::limit(strip_tags($paket->deskripsi), 80) }}</p>
                    </div>
                    <p class="text-xl font-semibold mt-4">Harga: Rp{{ number_format($paket->harga, 0, ',', '.') }}</p>
                </div>
            </a>
        @empty
            <p class="col-span-full text-center text-gray-600 text-lg">Belum ada data paket yang tersedia.</p>
        @endforelse
    </div>
@endsection