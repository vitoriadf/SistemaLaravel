<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <nav x-data="{ open: false }" class="border-solid border-2 border-fuchsia-300 dark:bg-fuchsia-200 transform transition duration-300 ease-in-out shadow-2xl ">
        
    <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">

                        <p class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-fuchsia-900 focus:outline-none focus:text-gray-700 dark:focus:text-fuchsia-700 focus:border-gray-300 dark:focus:border-fuchsia-700 transition duration-150 ease-in-out ">CDLER</p>


                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex space-x-8 sm:-my-px sm:ms-10 dark:text-fuchsia-900">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Inicio') }}
                        </x-nav-link>

                        <x-nav-link :href="route('produtos.index')" :active="request()->routeIs('produtos.index')">
                            {{ __('Produtos') }}
                        </x-nav-link>

                        <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                            {{ __('Categorias') }}
                        </x-nav-link>

                        <x-nav-link :href="route('marcas.index')" :active="request()->routeIs('marcas.index')">
                            {{ __('Marcas') }}
                        </x-nav-link>



                        <x-nav-link :href="route('cores.index')" :active="request()->routeIs('cores.index')">
                            {{ __('Cores') }}
                        </x-nav-link>

                        <x-nav-link :href="route('tecidos.index')" :active="request()->routeIs('tecidos.index')">
                            {{ __('Tecidos') }}
                        </x-nav-link>


                    </div>
                </div>



                <!-- Settings Dropdown -->
                <div class="hidden md:flex items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-fuchsia-900 bg-fuchsia dark:bg-fuchsia-200 hover:text-gray-700 dark:hover:text-fuchsia-800 focus:outline-none transition ease-in-out duration-150 transform hover:scale-105">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-fuchsia-900 hover:text-gray-500 dark:hover:text-fuchsia-800 hover:bg-gray-100 dark:hover:bg-fuchsia-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-fuchsia-900 focus:text-gray-500 dark:focus:text-fuchsia-400 transition duration-150 ease-in-out transform hover:scale-105">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
            <div class="pt-1 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>


                <x-responsive-nav-link :href="route('produtos.index')" :active="request()->routeIs('produtos.index')">
                    {{ __('Produtos') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                    {{ __('Categorias') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('marcas.index')" :active="request()->routeIs('marcas.index')">
                    {{ __('Marcas') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('cores.index')" :active="request()->routeIs('cores.index')">
                    {{ __('Cores') }}
                </x-responsive-nav-link>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-fuchsia-900">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-fuchsia-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>