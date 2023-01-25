<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title') | Epronge-h
    </title>
    @vite('resources/css/app.css')
    @yield('links')
</head>

<body>


    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="{{ url('') }}" class="flex items-center">
                <img src="{{ asset('assets/brand/epronge_logo.png') }}" class="h-6 mr-3 sm:h-9" alt="Epronge Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Epronge-h</span>
            </a>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Ouvrir le menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 bg-white-700 rounded md:bg-transparent md:text-white-700 md:p-0 dark:text-white"
                            aria-current="page">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('newEnroll.form') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Inscription
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')



    <footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ url('/') }}" class="flex items-center mb-4 sm:mb-0">
                <img src="{{ asset('assets/brand/epronge_logo.png') }}" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Epronge-H</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="{{ url('/') }}" class="mr-4 hover:underline md:mr-6 ">Accueil</a>
                </li>
                <li>
                    <a href="{{ route('newEnroll.form') }}" class="mr-4 hover:underline md:mr-6">Inscription</a>
                </li>

            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">©{{"2023"}} <a href="https://flowbite.com/"
                class="hover:underline">{{"Epronge-H"}}</a>. Tous droits reserves.
        </span>
    </footer>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    @yield('scripts')
</body>

</html>