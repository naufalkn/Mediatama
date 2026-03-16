<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tables - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <script src="./assets/js/focus-trap.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- Navbar --}}
        {{-- @include('partials.navbar') --}}

        <div style="display:flex">

            {{-- Sidebar --}}
            @include('partials.sidebar')

            {{-- Content --}}
            <main class="w-full">
                @yield('content')
            </main>

        </div>

    </div>
    <script src="https://unpkg.com/flowbite@2.2.1/dist/flowbite.min.js"></script>
</body>

</html>
