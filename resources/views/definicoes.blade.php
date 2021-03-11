<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--@if(\Illuminate\Support\Facades\Auth::)--}}
{{--<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>---}}
{{--<script src="{{asset('js/Fontaw.js')}}"></script>--}}

@if (!Auth::guest())
    <section class="h-screen w-screen bg-gray-200 flex flex-col-reverse sm:flex-row min-h-0 min-w-0 overflow-hidden">
        @include("layouts.sidebar")
        <main class="sm:h-full flex-1 flex flex-col min-h-0 min-w-0 overflow-auto">
            @include('layouts.guest')
            <section class="flex-1 md:p-6 lg:mb-0 lg:min-h-0 lg:min-w-0">
                <div class="flex flex-col lg:flex-row h-full w-full">

{{--                        <div class="border pb-2 lg:pb-0 w-full lg:max-w-sm px-3 flex flex-row lg:flex-col flex-wrap lg:flex-nowrap">--}}

{{--                            <!-- control content left -->--}}
{{--                        </div>--}}

                        <div class="border h-full w-full lg:flex-1 px-3 min-h-0 min-w-0">
                            <!-- component -->
                            <div class="bg-gray-200 min-h-screen  font-mono">
                                <div class="container mx-auto">
                                    <div class="inputs w-full max-w-2xl p-6 mx-auto">
                                        <h2 class="text-2xl text-gray-900">Definicções de conta</h2>
                                        <form class=" border-t border-gray-400 pt-4" method="post" action="change">
                                            <div class='flex flex-wrap -mx-3 mb-6'>

                                                <div class='w-full md:w-full px-3 mb-6'>
                                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='Email'>Email</label>
                                                    <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='Email' name="Email" value="{{auth()->user()->email}}" type='text' placeholder='{{auth()->user()->email}}'  required>
                                                </div>
                                                <div class='w-full md:w-full px-3 '>
                                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>password</label>
                                                </div>
                                                <div class="flex items-center justify-center h-24">
                                                    <div class="ml-3 inline-flex items-center text-indigo-100 transition-colors duration-150 bg-red-500 rounded-lg focus:shadow-outline hover:bg-red-800 modal-button bg-teal-200 p-3 rounded-lg text-teal-900 hover:bg-teal-300">
                                                        <span>Alterar a password</span>
                                                        <i class="ml-2 fad fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="modal opacity-0 pointer-events-none absolute w-full h-full top-0 left-0 flex items-center justify-center">
                                                    <div class="modal-overlay absolute w-full h-full bg-black opacity-25 top-0 left-0 cursor-pointer"></div>
                                                    <div class="absolute w-1/2 h-32 bg-white rounded-sm shadow-lg flex items-center justify-center text-2xl">

                                                        <div class='w-full md:w-full px-3 mb-6'>
                                                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='oldpassword'>Confirmar password atual</label>
                                                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='oldpassword' type='password' placeholder='password' name="oldpassword">
                                                        </div>
                                                        <div class='w-full md:w-full px-3 mb-6'>
                                                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='password'>Password Nova</label>
                                                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='password' type='password' placeholder='password' name="password">
                                                        </div>

                                                    </div>
                                                </div>

                                                <script>
                                                    const button = document.querySelector('.modal-button')
                                                    button.addEventListener('click', toggleModal)

                                                    const overlay = document.querySelector('.modal-overlay')
                                                    overlay.addEventListener('click', toggleModal)


                                                    function toggleModal () {
                                                        const modal = document.querySelector('.modal')
                                                        modal.classList.toggle('opacity-0')
                                                        modal.classList.toggle('pointer-events-none')
                                                    }

                                                </script>

                                                <div class='w-full md:w-full px-3 mb-6'>
                                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='phone'>Número de telefone</label>
                                                    <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='phone' name="phone" value="{{auth()->user()->phone_number}}" type='text' placeholder='{{auth()->user()->phone_number}}'  required>
                                                </div>
                                                @if(session('phem'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-green-400 text-center'>Email e telefone alterado</label>

                                                    </div>
                                                @endif
                                                @if(session('em'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-green-400 text-center'>Email Alterado</label>

                                                    </div>
                                                @endif
                                                @if(session('pw'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-green-400 text-center'>Password Alterada</label>

                                                    </div>
                                                @endif
                                                @if(session('ph'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-green-400 text-center'>Número de telefone alterado</label>

                                                    </div>
                                                @endif
                                                @if(session('Sucesso'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-green-400 text-center'>Pasword, Email e telefone alterado</label>

                                                    </div>
                                                @endif
                                                @if(session('pwem'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-green-400 text-center'>Password e Email alterado</label>

                                                    </div>
                                                @endif
                                                @if(session('pwph'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-green-400 text-center'>Password e telefone alterado</label>

                                                    </div>
                                                @endif
                                                @if(session('Error'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-red-400 text-center'>Password não corresponde</label>

                                                    </div>
                                                @endif
                                                @if(session('Erro'))
                                                    <div class='w-full md:w-full px-3 mb-6'>
                                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 bg-red-400 text-center'>Erro na alteração dos dados</label>

                                                    </div>
                                                @endif
                                                    <div class="flex justify-end">
                                                        <button class="ml-3 appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                        </div>

                </div>
            </section>
            @include('layouts.footer')
        </main>
    </section>

@else
    {{--    <meta http-equiv="refresh" content="1">--}}
    <body class="bg-opacity-50 bg-black" >
    <!-- component -->
    <style>
        .what {
            width: 100px;
            height: 100px;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;

            margin: auto;
        }
        .loader {
            border-top-color: #3498db;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }

        @-webkit-keyframes spinner {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spinner {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <div class="what loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-64 w-64"></div>

    <script >

        window.onload = function java (){
            location.replace("/peidas");
        }

    </script>

    @endif
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito&display=swap");

        body {
            font-family: "Nunito", sans-serif;
        }

        main {
            font-size: clamp(0.9rem, 3vw, 1rem);
        }

        #page-icon img {
            -webkit-animation: cssfilter 3s infinite;
        }


        @-webkit-keyframes cssfilter {
            0%, 100%  {
                filter: invert(75%) drop-shadow(0px 0px 2px blue)
            }

            50% {
                filter: invert(0%) drop-shadow(0px 0px 1px teal);
            }
        }

    </style>

