<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'eProcurement')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Include the Navbar Component -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="container mx-auto px-4 pb-20">
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleButton = document.getElementById('navbar-toggle');
            var menu = document.getElementById('navbar-menu');
            if (toggleButton && menu) {
                toggleButton.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>