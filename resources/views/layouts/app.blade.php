<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'EXLab - современная платформа для блоггинга')">
    <meta name="keywords" content="@yield('meta_keywords', 'блог, статьи, публикации')">
    <title>{{ config('app.name', 'EXLab') }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.jpg') }}">
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Стили -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Навигация -->
    <nav class="bg-white shadow-sm">
        <div class="container-custom">
            <div class="flex justify-between items-center h-16">
                <!-- Логотип -->
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <span class="text-2xl font-bold gradient-text">EXLab</span>
                </a>

                <!-- Основное меню -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('blog') }}" class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">
                        Блог
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Панель управления
                        </a>
                        <div class="relative" x-data="{ isOpen: false }">
                            <button @click="isOpen = !isOpen" 
                                    class="nav-link flex items-center"
                                    @click.away="isOpen = false">
                                <span>{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down ml-2 text-xs" 
                                   :class="{ 'transform rotate-180': isOpen }"></i>
                            </button>
                            
                            <div x-show="isOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                                 style="display: none;">
                                <a href="{{ route('profile.show') }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Профиль
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Выйти
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Войти</a>
                        <a href="{{ route('register') }}" class="btn-primary">Регистрация</a>
                    @endauth
                </div>

                <!-- Мобильное меню -->
                <div class="md:hidden">
                    <button @click="mobileMenu = !mobileMenu" class="text-gray-500 hover:text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Основной контент -->
    <main class="flex-grow">
        @if(session('success'))
            <div class="container-custom mt-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative animate-fade-in" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="container-custom mt-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative animate-fade-in" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Футер -->
    <footer class="bg-white shadow-sm mt-8">
        <div class="container-custom py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">О нас</h3>
                    <p class="text-gray-600">EXLab - платформа для создания и ведения блогов.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Навигация</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('blog') }}" class="text-gray-600 hover:text-blue-600">Блог</a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600">Панель управления</a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Контакты</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <span>info@exlab.ru</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span>+7 (999) 123-45-67</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center">
                <p>&copy; {{ date('Y') }} EXLab. Все права защищены.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
