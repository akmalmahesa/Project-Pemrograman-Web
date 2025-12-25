<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'Rentify - Rental & Sewa Kendaraan')</title>

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- TAILWIND CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- FONT AWESOME (ICON) --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- GLOBAL STYLE --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.7s ease-out;
        }

        .fade-up.show {
            opacity: 1;
            transform: translateY(0);
        }
        /* Image helpers to normalize different asset sizes */
        .img-rect {
            position: relative;
            padding-top: 56.25%; /* 16:9 aspect ratio */
            overflow: hidden;
        }

        .img-square {
            position: relative;
            padding-top: 100%; /* 1:1 aspect ratio */
            overflow: hidden;
        }

        .img-absolute {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        /* overlay badges on top of image containers */
        .card-badge {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            z-index: 30;
        }

        .img-overlay {
            position: absolute;
            left: 0.5rem;
            bottom: 0.5rem;
            z-index: 30;
        }

        .price-ribbon {
            position: absolute;
            left: 0.5rem;
            top: 0.5rem;
            z-index: 30;
            background: rgba(0,0,0,0.6);
            color: #fff;
            padding: 0.35rem 0.6rem;
            border-radius: 0.375rem;
            font-weight: 600;
            font-size: 0.85rem;
        }
        /* Card hover and overlay helpers */
        .card-container {
            position: relative;
            transition: transform .22s ease, box-shadow .22s ease;
        }

        .card-container:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(2,6,23,0.08);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0,0,0,0.45);
            opacity: 0;
            transform: translateY(8px);
            transition: opacity .18s ease, transform .22s ease;
            z-index: 40;
            gap: 0.5rem;
            padding: 1rem;
        }

        .card-container:hover .card-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .card-overlay .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 0.9rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        .action-btn.primary { background: #F59E0B; color: white; }
        .action-btn.ghost { background: rgba(255,255,255,0.95); color: #0F172A; }

        /* Filter panel: constrain height and make internal scroll */
        .filter-panel {
            position: sticky;
            top: 5.5rem; /* leave space for navbar */
            max-height: calc(100vh - 7.5rem);
            overflow: auto;
            padding-right: 0.25rem; /* space for scrollbar */
        }

        /* Range progressive fill using background gradient fallback */
        input[type=range].progressive {
            -webkit-appearance: none;
            appearance: none;
            height: 8px;
            border-radius: 999px;
            background: linear-gradient(90deg, #3B82F6 50%, #e6e6e6 50%);
            outline: none;
        }
        input[type=range].progressive::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            background: white;
            border: 3px solid #3B82F6;
            border-radius: 50%;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            cursor: pointer;
            margin-top: -5px;
        }
        input[type=range].progressive::-moz-range-thumb {
            width: 18px;
            height: 18px;
            background: white;
            border: 3px solid #3B82F6;
            border-radius: 50%;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            cursor: pointer;
        }
    </style>

    @yield('styles')
</head>

<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- PAGE CONTENT --}}
    <div class="@if(request()->routeIs('kendaraan.index', 'kendaraan.detail')) bg-gray-50 @endif pt-20">
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
