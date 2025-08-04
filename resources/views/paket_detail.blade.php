@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Kembali ke Daftar Paket</a>

        <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $paket->nama }}</h1>

        <div class="grid grid-cols-1 gap-8 items-start">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detail Paket:</h2>
                <p class="text-gray-700 leading-relaxed mb-4">{!! $paket->deskripsi !!}</p>
                <p class="text-3xl font-bold text-green-600 mb-6">
                    Harga Total: Rp{{ number_format($paket->harga, 0, ',', '.') }}
                </p>

                <a href="https://wa.me/6282329098019?text=Halo%20saya%20tertarik%20dengan%20paket%20{{ urlencode($paket->nama) }}%20di%20Katering%20Ku.%20Bisakah%20Anda%20memberikan%20informasi%20lebih%20lanjut%3F"
                   target="_blank"
                   class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out text-lg">
                    <i class="fab fa-whatsapp text-xl mr-3"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </div>
@endsection