<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rentify')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>

    @yield('styles')
</head>


<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- CONTENT --}}
    <div class="@if(request()->routeIs('kendaraan.index', 'kendaraan.detail')) bg-gray-50 @endif">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- FADE-UP ANIMATION --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const fadeElements = document.querySelectorAll(".fade-up");

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            fadeElements.forEach(el => observer.observe(el));
        });
    </script>

    @stack('scripts')
    @yield('scripts')

</body>
</html>
