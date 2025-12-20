<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rentify - Auth')</title>

    <!-- TAILWIND CDN (WAJIB ADA DI HEAD) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    @yield('styles')
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <!-- CONTENT -->
    @yield('content')

    <!-- SCRIPTS -->
    @yield('scripts')

</body>
</html>
