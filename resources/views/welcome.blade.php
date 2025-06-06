<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Azzhahiriyah </title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('azzhahiriyah.png') }}" width="50" height="50" alt="" type="image/png">
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/app.css">
    <style>
        .triangle-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            font-size: 0.5rem;
            font-weight: bold;
            line-height: 1;
            color: #6b7280;
            margin-top: 0;
            margin-left: 5px;
        }

        .top-text {
            font-size: 0.5rem;
            letter-spacing: 0.1em;
            margin-bottom: 2px;
            margin-left: 17px;
            /* Hilangkan margin left */
        }

        .bottom-text {
            font-size: 0.5rem;
            letter-spacing: 0.2em;
            position: relative;
        }
    </style>

</head>
<body class="antialiased bg-white-900 dark:bg-gray-900 text-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <a href="/" class="flex items-center">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
<div class="triangle-text">
        <div class="top-text">YAYASAN</div>
        <div class="bottom-text">AZZHAHIRIYAH</div>
    </div>
                </a>
                <div class="flex items-center space-x-4 mt-4 md:mt-0">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900">Daftar</a>
                        @endif
                    @endauth
                </div>


            </div>

            <div class="flex flex-col items-center mt-16">
                <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800 dark:text-white">Selamat datang di </h1>
                <h2 class="text-3xl font-semibold mb-6 text-red-400">Perpustakaan Azzhahiriyah</h2>
                <p class="text-gray-100 text-center max-w-md text-gray-800 dark:text-white">Masuk untuk mengakses layanan perpustakaan secara online.</p>
                <div class="flex flex-col md:flex-row mt-8 space-y-4 md:space-y-0 md:space-x-4">
                    <a href="{{ route('login') }}" class="bg-white shadow-lg rounded-lg p-4 flex items-center justify-center space-x-2 transition duration-300 hover:shadow-xl w-full md:w-auto">
                        <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                            <img src="https://www.svgrepo.com/show/408745/login-sign-in-user-entrance-account.svg" alt="Login Icon" class="w-8 h-8">
                        </div>
                        <span class="text-xl font-semibold text-gray-900">Masuk</span>
                    </a>
                    <a href="{{ route('register') }}" class="bg-white shadow-lg rounded-lg p-4 flex items-center justify-center space-x-2 mt-4 md:mt-0 transition duration-300 hover:shadow-xl w-full md:w-auto">
                        <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                            <img src="https://www.svgrepo.com/show/515135/book.svg" alt="Register Icon" class="w-8 h-8">
                        </div>
                        <span class="text-xl font-semibold text-gray-900">Daftar</span>
                    </a>
                </div>
            </div>

              <!-- Toggle Switch for Dark Mode -->
    
            <div class="flex justify-between items-center mt-16">
                <p class="text-sm text-gray-500">© {{ date('Y') }} Perpustakaan Azzhahiriyah. <a>Dibuat oleh Dimas Aditya Putranto</a></p>
            </div>
        </div>
    </div>
</body>
<script src="/assets/app.js"></script>


</html>
