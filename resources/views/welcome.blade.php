@extends('layouts.app')

@section('title', 'Accueil')

@section('links')

@endsection

@section('content')

    {{-- start carouseel --}}
    <!-- component -->
    <section class="bg-white pt-24 transition-transform duration-300 ease-in-out hover:scale-150">
        <div class="mx-auto max-w-7xl px-12">
            <div class="mx-auto w-full text-left md:w-11/12 md:text-center xl:w-9/12">
                <h1
                    class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight">
                    <span>Vous </span>
                    <span
                        class="leading-12 block w-full bg-gradient-to-r from-orange-400 to-orange-500 bg-clip-text py-2 text-transparent lg:inline">recherchez</span>
                    <span>une école de</span>
                    <span
                        class="leading-12 block w-full bg-gradient-to-r from-orange-400 to-orange-500 bg-clip-text py-2 text-transparent lg:inline">qualité
                        ?</span>
                </h1>
                <p class="mb-8 px-0 text-lg text-gray-600 md:text-xl lg:px-24">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam suscipit, tenetur a eius nisi enim
                    debitis
                </p>
                <div class="mb-4 space-x-0 md:mb-8 md:space-x-2">
                    <a href="{{ route('newEnroll.form') }}"
                        class="mb-2 inline-flex w-full items-center justify-center rounded-2xl bg-orange-400 px-6 py-3 text-lg text-white sm:mb-0 sm:w-auto">
                        Inscrivez-vous
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#seeMore"
                        class="mb-2 inline-flex w-full items-center justify-center rounded-2xl bg-red-200 px-6 py-3 text-lg sm:mb-0 sm:w-auto">
                        Voir plus
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="mx-auto my-2 mt-20 w-full text-center md:w-10/12">
                <div class="relative z-0 mt-8 w-full">
                    <div class="relative overflow-hidden rounded-lg shadow-2xl">
                        {{-- <div class="flex h-11 flex-none items-center rounded-xl rounded-b-none bg-green-400 px-4">
                            <div class="flex space-x-1.5">
                                <div class="h-3 w-3 rounded-full border-2 border-white"></div>
                                <div class="h-3 w-3 rounded-full border-2 border-white"></div>
                                <div class="h-3 w-3 rounded-full border-2 border-white"></div>
                            </div>
                        </div> --}}
                        <img src="{{ asset('assets/img/graduation1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end carouseel --}}

    {{-- info --}}
    <section id="seeMore"
        class="hover:scale-120 relative my-16 bg-orange-100 py-16 transition-transform duration-300 ease-in-out">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="-mt-78 mr-auto ml-auto w-10/12 px-12 md:w-6/12 md:px-4 lg:w-4/12">
                    <div class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg bg-orange-500 shadow-lg">
                        <img alt="..." src="{{ asset('assets/img/graduation3.jpg') }}"
                            class="w-full rounded-t-lg align-middle">
                        <blockquote class="relative mb-4 p-8">
                            {{-- <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                class="h-95-px -top-94-px absolute left-0 block w-full">
                                <polygon points="-30,95 583,95 583,65" class="fill-current text-pink-500"></polygon>
                            </svg> --}}
                            <h4 class="text-xl font-bold text-white">
                                Mieux former pour être utile
                            </h4>
                            <p class="text-md mt-2 font-light text-white">
                                Pour toutes informations supplémentaires, passez nous voir au
                                <span class="font-bold"> de l'institut Drop Of Love (IDOL)</span><br>
                                Ou contactez-nous par WhatsApp au numéro : <span class="font-bold"> (+509) 3775-2935</span>
                            </p>
                        </blockquote>
                    </div>
                </div>

                <div class="w-full px-4 md:w-6/12">
                    <h3 class="text-center text-3xl font-semibold" style="color: rgb(237,10,118);">Options disponibles</h3>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 md:w-6/12">

                            <div class="relative mt-4 flex flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg">
                                        <i class="fas fa-sitemap"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold">Informatique bureautique</h6>
                                    <p class="text-blueGray-500 mb-4">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia omnis eos placeat.
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg">
                                        <i class="fas fa-drafting-compass"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold">
                                        Feature 3
                                    </h6>
                                    <p class="text-blueGray-500 mb-4">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia omnis eos placeat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4 md:w-6/12">
                            <div class="relative mt-4 flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold">Carellage</h6>
                                    <p class="text-blueGray-500 mb-4">
                                        This extension also comes with 3 sample pages. They are
                                        fully coded so you can.
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold">Feature 4</h6>
                                    <p class="text-blueGray-500 mb-4">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia omnis eos placeat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- end info --}}

@endsection


@section('scripts')

@endsection
