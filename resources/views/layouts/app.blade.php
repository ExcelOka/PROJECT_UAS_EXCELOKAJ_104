<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hana Katering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom Scrollbar yang disesuaikan dengan tema ungu */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f0f2f5; /* Warna latar yang lebih lembut */
        }
        ::-webkit-scrollbar-thumb {
            background: #8B5CF6; /* Warna ungu dari gradasi */
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6D28D9; /* Warna ungu yang lebih gelap saat hover */
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    
    {{-- Navbar dengan Latar Belakang Gradasi Ungu --}}
    <nav class="bg-gradient-to-r from-purple-600 to-indigo-700 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="{{ route('home') }}" class="text-3xl font-extrabold text-white tracking-tight">Hana Katering</a>
            {{-- Anda bisa menambahkan link navigasi lain di sini jika perlu --}}
        </div>
    </nav>

    <main class="container mx-auto p-6 mt-4">
        @yield('content')
    </main>

    {{-- Footer dengan Latar Belakang Gradasi Ungu --}}
    <footer class="bg-gradient-to-r from-indigo-700 to-purple-600 text-white text-center p-8 mt-16">
        <div class="container mx-auto">
            <p class="font-semibold text-lg">Hana Katering</p>
            {{-- Menggunakan nama yang konsisten dengan navbar --}}
            <p class="text-indigo-200 text-sm mt-1">© {{ date('Y') }} All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>