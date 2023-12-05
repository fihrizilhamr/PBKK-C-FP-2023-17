<head>
<link rel="stylesheet" href="{{ asset('/css/home-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<nav>
         <!-- menu dan logo di wrapper -->
        <div class="wrapper">
            <!-- logo -->
            <div class="logo">
                <a href =''>GoGym</a>
            </div>
            <!-- menu navigasi-->
            <div class="menu">
                <ul>
                    <li><a href="{{ route('list-articles') }}">Article</a></li>
                    <li><a href="{{ route('home') }}">Contact</a></li>
                    <!-- <li> -->
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}" class="tombol-biru">Dashboard</a></li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                            @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                <li>
                            @endif
                        @endauth
                    @endif
                    <!-- </li> -->
                </ul>
            </div>
        </div>
    </nav>