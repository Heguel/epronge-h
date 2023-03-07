@extends('layouts.app')

@section('title', 'Accueil')

@section('links')

@endsection

@section('content')

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @endpush

    {{-- start carouseel --}}
    <!-- component -->
    <section class="bg-white pt-24 ">
        <div class="mx-auto max-w-7xl px-12">
            <div class="mx-auto w-full text-left md:w-11/12 md:text-center lg:w-11/12 xl:w-11/12">
                <h1
                    class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight sm:text-center ">
                    <span>Vous </span>
                    <span
                        class="leading-12 block w-full bg-gradient-to-r from-orange-400 to-orange-500 bg-clip-text py-2 text-transparent lg:inline sm:text-ce">recherchez</span>
                    <span>une école de</span>
                    <span
                        class="leading-12 block w-full bg-gradient-to-r from-orange-400 to-orange-500 bg-clip-text py-2 text-transparent lg:inline sm:text-center">qualité
                        ?</span>
                </h1>
                <p class="mb-8 px-0 text-lg text-gray-600 md:text-xl lg:px-24">
                    <span class="font-bold">EPRONGE-H, école professionnelle de la nouvelle génération-Haïtienne de Limbé, 
                        c’est la meilleure référence dans la cité en matière de qualité. <span>
                </p>
                <div class="mb-4 space-x-0 md:mb-8 md:space-x-2">
                    <a href="{{ route('newEnroll.form') }}"
                        class="mb-2 inline-flex w-full items-center justify-center rounded-2xl bg-orange-400 px-6 py-3 text-lg text-white sm:mb-0 sm:w-auto transition-transform duration-300 ease-in-out hover:shadow-xl">
                        Inscrivez-vous
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#seeMore"
                        class="mb-2 inline-flex w-full items-center justify-center rounded-2xl bg-red-200 px-6 py-3 text-lg sm:mb-0 sm:w-auto transition-transform duration-300 ease-in-out hover:shadow-xl">
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

            <div class="my-2 mt-12 w-full text-center md:w-full sm:w-full lg:w-full xl:w-full 2xl:w-full">
                <div class="relative z-0 mt-3 w-full">
                    <div class="relative overflow-hidden rounded-lg shadow-2xl">
                    
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate1.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate2.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate3.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate4.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate5.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate6.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate7.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate8.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate9.jpg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate10.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate11.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate12.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate13.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate14.jpeg') }}" alt="image" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="object-cover w-full h-fit"
                                        src="{{ asset('assets/img/graduate15.jpeg') }}" alt="image" />
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end carouseel --}}

    {{-- info on more options --}}
    <section id="seeMore" class="relative my-16 bg-orange-100 py-16">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="-mt-78 items-center mr-auto ml-auto w-10/12 md:px-4 md:w-4/12 md:px-4 lg:w-4/12">
                    <div
                        class="disabled:scale-105 relative items-center mb-6 flex w-full min-w-0 flex-col break-words rounded-lg bg-orange-500 shadow-lg transition-transform duration-300 ease-in-out hover:scale-105">
                        <img alt="..." src="{{ asset('assets/img/graduate11.jpeg') }}"
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
                                Pour toutes informations supplémentaires, passez nous voir à
                                <span class="font-bold"> l'institut Drop Of Love (IDOL) du Limbé, Malor, Limbé,
                                    Haiti</span><br>
                                Ou contactez-nous par WhatsApp au numéro : <span class="font-bold"> (+509) 3775-2935,</span>
                                Ou pour appel
                                direct composer le numéro suivant: <span class="font-bold"> (+509) 3427-2493</span>
                            </p>
                        </blockquote>
                    </div>
                </div>

                <div class="w-full px-2 md:w-8/12">
                    <h3 class="text-center text-3xl font-semibold " style="color: rgb(255, 138, 76);">Les options</h3>
                    <div class="flex flex-wrap">
                        <div class="w-full px-2 md:w-4/12">

                            <div class="relative mt-4 flex flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg hover:text-orange-400">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold text-orange-400">Informatique de bureau</h6>
                                    <p class="text-justify text-normal tracking-normal text-blueGray-500 mb-4">
                                        L'informatique s'intéresse à la mise en œuvre de méthodes scientifiques pour traiter l'information de façon 
                                        au moyen d'ordinateurs. Elle permet une bonne gestion des entreprises et les échanges financiers. 
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg hover:text-orange-400">
                                        <i class="fas fa-pizza-slice"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold text-orange-400">
                                        Cuisine et Pâtisserie
                                    </h6>
                                    <p class="text-justify text-normal tracking-normal text-blueGray-500 mb-4">
                                        C’est l’ensemble des opérations nécessaires à la confection des mets à base de pâte cuite, notamment des gâteaux, 
                                        ou tout simplement, l’art de confectionner ces mets.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-2 md:w-4/12">
                            <div class="relative mt-4 flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg hover:text-orange-400">
                                        <i class="fas fa-cut"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold text-orange-400">Cosmétologie</h6>
                                    <p class="text-justify text-normal tracking-normal ext-blueGray-500 mb-4">
                                        C’est la partie d'hygiène qui étudie la composition, l'emploi des produits cosmétiques, et leurs effets sur 
                                        l'organisme. Le cosmétologue est chargé de la création et de la formulation de produits cosmétiques.                                   
                                    </p>
                                </div>
                            </div>
                           
                            <div class="relative flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg hover:text-orange-400">
                                        <i class="fas fa-toolbox"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold text-orange-400">Électricité batiment</h6>
                                    <p class="text-justify text-normal text-blueGray-500 mb-4">
                                        Dans le bâtiment, l’électricité est une source d’énergie majeure utilisée à la fois pour le chauffage, 
                                        la production de chaude sanitaire, la cuisson, et les usages ménagers.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full px-2 md:w-4/12">
                            <div class="relative mt-4 flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg hover:text-orange-400">
                                        <i class="fas fa-hammer"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold text-orange-400">Carellage</h6>
                                    <p class="text-justify text-normal text-blueGray-500 mb-4">
                                        C’est l’habillage des murs, des parois et des sols avec des carreaux de céramique mais aussi de marbre, 
                                        de grès, de porcelaine. Un carreleur ou une carreleuse prépare les surfaces à carreler et 
                                        construit des socles.
                                    </p>
                                </div>
                            </div>
                           
                            <div class="relative flex min-w-0 flex-col">
                                <div class="flex-auto px-4 py-5">
                                    <div
                                        class="text-blueGray-500 mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center shadow-lg hover:text-orange-400">
                                        <i class="fas fa-shower"></i>
                                    </div>
                                    <h6 class="mb-1 text-xl font-semibold text-orange-400">Plomberie Sanitaire</h6>
                                    <p class="text-justify text-normal text-blueGray-500 mb-4">
                                        La plomberie c’est l’art d’installer ou de faire l'entretien des systèmes utilisés pour l'eau 
                                        potable, ainsi que pour les égouts et le drainage dans les systèmes de plomberie.
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
    
    @push('scripts')
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                cssMode: true,
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                mousewheel: true,
                keyboard: true,
            });
        </script>
    @endpush
@endsection


@section('scripts')

@endsection
