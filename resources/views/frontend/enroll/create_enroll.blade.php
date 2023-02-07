@extends('layouts.app')
@section('title', 'New')

@section('links')
    <style>
        /*remove custom style*/
        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {

            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }
    </style>

    @include('sweetalert::alert')


@endsection

@section('content')

    <div class="relative flex min-h-screen rounded-lg">
        <div
            class="min-w-0 flex-auto flex-col items-center bg-white sm:flex sm:flex-row sm:justify-center md:items-start md:justify-start">
            <div class="relative hidden h-full flex-auto items-center justify-center overflow-hidden bg-orange-900 bg-cover bg-no-repeat p-10 text-white sm:w-1/2 md:flex xl:w-1/2"
                style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
                <div class="absolute inset-0 z-0 bg-gradient-to-b from-orange-600 to-orange-500 opacity-75"></div>
                <div class="z-10 w-full max-w-md">
                    <img src="{{ asset('assets/brand/logo_epronge.jpg') }}" alt="Epronge logo" /> <br />
                    <div class="mb-6 font-bold leading-tight sm:text-4xl xl:text-5xl">À EPRONGE-H,
                    </div>
                    <div class="xl:text-md font-normal text-gray-200 sm:text-sm">Nous bâtissons l’avenir des jeunes en
                        investissant dans leur formation
                        professionnelle et du professionnalisme car, nous ne trahirons pas notre devise. <br />
                        <span class="font-bold">Mieux former pour être utile ! <span>
                    </div>
                </div>
                <!---remove custom style-->
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div
                class="w-full bg-white p-8 sm:w-auto sm:rounded-lg md:flex md:h-full md:items-center md:justify-center md:rounded-none md:p-10 lg:w-2/5 lg:p-14 xl:w-2/5">
                <div class="w-full space-y-8 lg:max-w-md">
                    <div class="text-center">
                        <h2 class="mt-6 text-5xl font-bold text-orange-500">
                            Bienvenue!
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">
                            Veuillez remplir ce formulaire pour éffectuer une réservation!
                        </p>
                    </div>

                    <form method="POST" action="{{ route('enrolls.store') }}">
                        @csrf
                        @if (isset($errors) && $errors->all())
                            <div class="alert alert-danger">
                                <ul class="mb-2 p-2">
                                    @foreach ($errors->all() as $error)
                                        <li class="rounded-lg bg-red-50 text-sm text-red-500 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- @if (session('success'))
                            <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-500 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                {{ session('success') }}
                            </div>
                        @endif --}}

                        <div class="mb-6 grid gap-6 md:grid-cols-2">
                            {{-- start first name --}}
                            <div>
                                <label for="first_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                                <input type="text" id="first_name" name="firstname"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="John" required>
                                @error('firstname')
                                    <small class="text-red-400">Veuillez entrer votre prénom </small>
                                @enderror
                            </div>
                            {{-- end first name --}}

                            {{-- start last name --}}
                            <div>
                                <label for="last_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nom de
                                    famille</label>
                                <input type="text" id="last_name" name="lastname"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="Doe" required>
                                @error('lastname')
                                    <small class="text-red-400">Veuillez entrer votre nom de famille </small>
                                @enderror
                            </div>
                            {{-- end last name --}}


                            {{-- start email --}}

                            <div>
                                <label for="email"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="email" name="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="john.doe@gmail.com">
                                @error('email')
                                    <small class="text-red-400">Veuillez entrer votre email </small>
                                @enderror
                            </div>
                            {{-- end email --}}

                            {{-- start phone --}}
                            <div>
                                <label for="phone"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Numéro de
                                    téléphone</label>
                                <input type="tel" id="phone" name="phone"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="0000-0000" pattern="[0-9]{4}-[0-9]{4}" required>
                                @error('phone')
                                    <small class="text-red-400">Veuillez entrer votre numéro de téléphone </small>
                                @enderror
                            </div>
                            {{-- end phone --}}


                            {{-- start sexe --}}
                            <div>
                                <label for="gender" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Sexe
                                </label>
                                <select id="gender" name="gender"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    required>
                                    <option value="">Selectionnez votre sexe</option>
                                    <option value="Female">Feminin</option>
                                    <option value="Male">Masculin</option>
                                    <option value="Other">Autre</option>
                                </select>
                                @error('gender')
                                    <small class="text-red-400">Veuillez selectionner votre sexe </small>
                                @enderror
                            </div>
                            {{-- end sexe --}}

                            {{-- start option --}}
                            <div>
                                <label for="option" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Option
                                </label>
                                <select id="option" name="option_id"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    required>
                                    <option value="">Selectionner une option</option>
                                    @forelse ($options as $option)
                                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                @error('option_id')
                                    <small class="text-red-400">Veuillez selectionner une option </small>
                                @enderror
                            </div>
                            {{-- end option --}}

                            {{-- start date_of_birth --}}
                            <div>
                                <label for="birthdayBefore12Years"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Date de naissance
                                </label>
                                
                                <input type="date" id="birthdayBefore12Years" name="date_of_birth"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="Select a date" required>
                                @error('date_of_birth')
                                    <small class="text-red-400">Veuillez entrer votre date de naissance </small>
                                @enderror
                            </div>
                            {{-- end date_of_birth --}}

                        </div>


                        <div class="mb-6 flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="remember" type="checkbox" value=""
                                    class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    required>
                            </div>
                            <label for="remember"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">J'accepte les
                                <a href="#" class="text-orange-600 hover:underline dark:text-orange-500">termes et
                                    conditions</a>.</label>
                        </div>
                        <button type="submit"
                            class="w-full rounded-lg rounded bg-orange-600 p-2 text-center text-sm font-bold text-white shadow-lg transition duration-200 hover:bg-orange-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-300 sm:w-auto">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            var date = new Date();
            date.setFullYear(date.getFullYear() - 12);

            $('#birthdayBefore12Years').attr('max', date.toISOString().substring(0, 10));
            $('#birthdayBefore12Years').val(date.toISOString().substring(0, 10));
        });
    </script>


    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": 0,
                "extendedTimeOut": 0,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "tapToDismiss": false
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true "timeOut": 15000 * 60 * 3 // duration in milliseconds
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": 0,
                "extendedTimeOut": 0,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "tapToDismiss": false
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true "timeOut": 1000 * 60 * 3 // duration in milliseconds
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

@endsection
