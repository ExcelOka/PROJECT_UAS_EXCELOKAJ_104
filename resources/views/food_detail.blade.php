@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-br from-purple-600 to-indigo-800 rounded-2xl shadow-2xl p-8 max-w-4xl mx-auto">
        {{-- TOMBOL KEMBALI YANG DIPERBARUI --}}
        <a href="{{ route('home') }}"
           class="inline-flex items-center bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold py-2 pl-3 pr-4 rounded-full transition-all duration-300 ease-in-out mb-8 transform hover:-translate-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar
        </a>

        <h1 class="text-5xl font-extrabold text-white mb-6 tracking-tight">{{ $food->nama }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <div class="flex justify-center">
                @if ($food->foto)
                    <img src="{{ asset('storage/' . $food->foto) }}" alt="{{ $food->nama }}" class="w-full h-auto rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-80 bg-gray-700 bg-opacity-50 rounded-xl flex items-center justify-center text-gray-400 text-2xl font-semibold">
                        Gambar Tidak Tersedia
                    </div>
                @endif
            </div>
            <div class="text-white">
                <h2 class="text-3xl font-bold mb-4 border-b-2 border-purple-400 pb-2">Detail Paket:</h2>
                <div class="prose prose-invert text-gray-200 leading-relaxed mb-6">{!! $food->deskripsi !!}</div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6 mb-6">
                    <p class="text-3xl font-bold text-yellow-300 mb-2">
                        Harga Paket: Rp{{ number_format($food->harga_per_orang * $food->min_orang, 0, ',', '.') }}
                    </p>
                    <p class="text-gray-300 text-md">
                        Untuk <strong>{{ $food->min_orang }}</strong> Orang (Rp{{ number_format($food->harga_per_orang, 0, ',', '.') }} per orang, minimal {{ $food->min_orang }} orang)
                    </p>
                </div>

                <a href="https://wa.me/6282329098019?text=Halo%20saya%20tertarik%20dengan%20paket%20food%20{{ urlencode($food->nama) }}%20di%20Katering%20Ku.%20Bisakah%20Anda%20memberikan%20informasi%20lebih%20lanjut%3F"
                   target="_blank"
                   class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-full shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out text-lg">
                    <i class="fab fa-whatsapp text-2xl mr-4"></i> Hubungi Kami di WhatsApp
                </a>
            </div>
        </div>
    </div>
@endsection