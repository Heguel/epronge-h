<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title') | Epronge-H
    </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('sweetalert::alert')
    
    @yield('links')
    @livewireStyles
</head>

<body class="">


    <nav class="rounded border-gray-200 bg-white px-2 py-2.5 dark:bg-gray-900 sm:px-4">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <a href="{{ url('') }}" class="flex items-center">
                <img src="{{ asset('assets/brand/logo_epronge.jpg') }}" class="mr-3 h-6 sm:h-9" alt="Epronge Logo" />
                <span
                    class="self-center whitespace-nowrap text-xl font-semibold text-orange-500 dark:text-white">Epronge-H</span>
            </a>

            <button data-collapse-toggle="navbar-default" type="button"
                class="ml-3 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Ouvrir le menu</span>
                <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:text-sm md:font-medium md:dark:bg-gray-900">
                    {{-- @if (Route::is('')) --}}
                    <li>
                        <a href="{{ url('/') }}"
                            class="bg-white-700 md:text-white-700 block rounded py-2 pl-3 pr-4 text-gray-700 transition duration-300 ease-in-out hover:text-orange-400 dark:text-white md:bg-transparent md:p-0"
                            aria-current="page">Accueil</a>
                    </li>
                    {{-- @endif --}}
                    @if (!Route::is('newEnroll.form'))
                        <li>
                            <a href="{{ route('newEnroll.form') }}"
                                class="block rounded py-2 pl-3 pr-4 text-gray-700 transition duration-300 ease-in-out hover:bg-gray-100 hover:text-orange-400 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent md:dark:hover:text-white">
                                Inscription
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')



    <footer
        class="flex items-center justify-between rounded-lg bg-white p-4 shadow transition-transform duration-300 ease-in-out dark:bg-gray-900 sm:flex-col sm:justify-evenly md:px-6 md:py-8">


        <div class="w-full">
            <div class="container mx-auto flex flex-col flex-wrap py-4 px-5 sm:flex-row">
                <p class="text-center text-sm text-gray-500 sm:text-left">
                    ©{{ '2023' }}
                    <a href="#" class="hover:underline">{{ 'Epronge-H' }}</a> - Tous droits reservés.
                </p>

                <span class="mt-2 inline-flex justify-center sm:ml-auto sm:mt-0 sm:justify-start">
                    <a class="text-xl text-gray-500 transition duration-300 ease-in-out hover:text-blue-400"
                        href="https://www.facebook.com/Epronge-H-104966754717892/
                        ">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a class="ml-3 text-xl text-gray-500 transition duration-300 ease-in-out hover:text-green-400"
                        href="https://wa.me/50937752935">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a class="ml-3 text-xl text-gray-500 transition duration-300 ease-in-out hover:text-cyan-400"
                        href="https://t.me/EPRONGE_H_LIMBE">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                </span>
            </div>
            <hr>
            <p class="py-4 text-center text-base text-gray-500">
                Powered by <a href="mailto:heguel55@gmail.com/" target="_BLANK" class="text-orange-400">Ing. Heguel</a>
            </p>
        </div>
    </footer>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    @yield('scripts')
    @stack('scripts')
    @livewireScripts

    {{-- start sweetalert --}}
    <script>
        window.addEventListener('NewEnrollEvent', event => {
            console.warn("Event must be pass");
            console.log(event);

            Swal.fire({
                title: 'Custom width, padding, color, background.',
                width: 600,
                padding: '3em',
                color: '#716add',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`
                background: '#fff url(/images/trees.png)',
                backdrop: `
                rgba(0,0,123,0.4)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `
            })
        })

        window.addEventListener('event-success-create-enroll', event => {
            console.warn("Event must be pass");
            console.log("HHHH: ", event);

            Swal.fire({
                title: '<strong>HTML <u>example</u></strong>',
                icon: 'info',
                html: 'You can use <b>bold text</b>, ' +
                    '<a href="#">links</a> ' +
                    'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: 'Thumbs down'
            })
        })

        //         Swal.fire({
        //   title: '<strong>HTML <u>example</u></strong>',
        //   icon: 'info',
        //   html:
        //     'You can use <b>bold text</b>, ' +
        //     '<a href="//sweetalert2.github.io">links</a> ' +
        //     'and other HTML tags',
        //   showCloseButton: true,
        //   showCancelButton: true,
        //   focusConfirm: false,
        //   confirmButtonText:
        //     '<i class="fa fa-thumbs-up"></i> Great!',
        //   confirmButtonAriaLabel: 'Thumbs up, great!',
        //   cancelButtonText:
        //     '<i class="fa fa-thumbs-down"></i>',
        //   cancelButtonAriaLabel: 'Thumbs down'
        // })
    </script>
    {{-- end sweetalert --}}


</body>

</html>
