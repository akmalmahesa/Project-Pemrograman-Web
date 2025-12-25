<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rentify - Auth')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-white flex items-center justify-center">

    {{-- ⚠️ PENTING: TIDAK ADA GAMBAR DI SINI --}}
    {{-- ⚠️ BACKGROUND HALAMAN = PUTIH --}}

    @yield('content')

    @yield('scripts')
</body>
</html>
