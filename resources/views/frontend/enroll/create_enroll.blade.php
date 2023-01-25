@extends('layouts.app')
@section('title', 'New')

@section('links')
@endsection

@section('content')

    <div class="flex justify-center align-center">
        <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    Inscription
                </h5>
            </a>

            <div class="alert alert-danger">
                <ul class="p-2 mb-2 ">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm text-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('enrolls.store') }}">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    {{-- start first name --}}
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                            name</label>
                        <input type="text" id="first_name" name="firstname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John" required>
                        @error('firstname')
                            <small class="text-red-400 ">Veuillez entrer votre prenom </small>
                        @enderror
                    </div>
                    {{-- end first name --}}

                    {{-- start last name --}}
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            name</label>
                        <input type="text" id="last_name" name="lastname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Doe" required>
                        @error('lastname')
                            <small class="text-red-400 ">Veuillez entrer votre nom </small>
                        @enderror
                    </div>
                    {{-- end last name --}}


                    {{-- start email --}}

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            address</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="john.doe@company.com" required>
                        @error('email')
                            <small class="text-red-400 ">Veuillez entrer votre email </small>
                        @enderror
                    </div>
                    {{-- end email --}}

                    {{-- start phone --}}
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            number</label>
                        <input type="tel" id="phone" name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="0000-0000" pattern="[0-9]{4}-[0-9]{4}" required>
                        @error('phone')
                            <small class="text-red-400 ">Veuillez entrer votre email </small>
                        @enderror
                    </div>
                    {{-- end phone --}}


                    {{-- start sexe --}}
                    <div>
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Sexe
                        </label>
                        <select id="gender" name="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="">Selectionner une sexe</option>
                            <option value="Female">Feminin</option>
                            <option value="Male">Masculin</option>
                            <option value="Other">Autre</option>
                        </select>
                        @error('gender')
                            <small class="text-red-400 ">Veuillez entrer votre email </small>
                        @enderror
                    </div>
                    {{-- end sexe --}}

                    {{-- start option --}}
                    <div>
                        <label for="option" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Option
                        </label>
                        <select id="option" name="option_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="">Selectionner une option</option>
                            @forelse ($options as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @empty
                                <option value="">Empty</option>
                            @endforelse
                        </select>
                        @error('option_id')
                            <small class="text-red-400 ">Veuillez entrer votre email </small>
                        @enderror
                    </div>
                    {{-- end option --}}

                    {{-- start date_of_birth --}}
                    <div>
                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Date de naissance
                        </label>
                        <input type="date" id="date_of_birth" name="date_of_birth"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select a date" required>
                        @error('date_of_birth')
                            <small class="text-red-400 ">Veuillez entrer votre email </small>
                        @enderror
                    </div>
                    {{-- end date_of_birth --}}

                </div>


                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                            required>
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the
                        <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                            conditions</a>.</label>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

            {{-- <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                Avez-vous un compte ?
            </a> --}}

        </div>
    </div>


@endsection

@section('scripts')
@endsection
