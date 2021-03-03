<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--@if(\Illuminate\Support\Facades\Auth::)--}}
{{--<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>---}}
{{--<script src="{{asset('js/Fontaw.js')}}"></script>--}}

@if (!Auth::guest())
    <section class="h-screen w-screen bg-gray-200 flex flex-col-reverse sm:flex-row min-h-0 min-w-0 overflow-hidden">
       @include("layouts.sidebar")
        <main class="sm:h-full flex-1 flex flex-col min-h-0 min-w-0 overflow-auto">
            @include('layouts.guest')
            <section class="flex-1 pt-3 md:p-6 lg:mb-0 lg:min-h-0 lg:min-w-0">
                <div class="flex flex-col lg:flex-row h-full w-full">
                    @if(session('userinfo') || isset($userinfo))
                        <?php
                        $d=session('userinfo') ?? $userinfo;
                        ?>

                    <div class="border pb-2 lg:pb-0 w-full lg:max-w-sm px-3 flex flex-row lg:flex-col flex-wrap lg:flex-nowrap">

                        <!-- control content left -->
                        <div class=" w-full h-24 min-h-0 min-w-0 mb-4">
                            <div class="p-2 ">
                                <a href="/sendSMS">
                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">

                                    <i class="fad fa-paper-plane"></i>
                                    <div>
                                        <p class="text-lg text-center font-medium ml-2 ">
                                          Enviar Menssagens
                                        </p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="w-full h-24 min-h-0 min-w-0 mb-4">
                            <div class="p-2 ">
                                <a href="/recivedsms">
                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                        <i class="fad fa-inbox"></i>
                                    <div>
                                        <p class="text-lg text-center font-medium ml-2 ">
                                            Menssagens Recebidas
                                        </p>

                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                            <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                    <a href="/enviadas">
                                        <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                            <i class="fad    fa-share-square fill-current" ></i>
                                            <div>
                                            <p class="text-lg text-center font-medium ml-2 ">
                                               Menssagens Enviadas
                                            </p>

                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        @if(auth()->user()->Admin)
                        <div class="w-full h-24 min-h-0 min-w-0 mb-4">
                            <div class="p-2 ">
                                <a href="/">
                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">

                                    <i class="fas fa-phone fill-current"> </i>
                                    <div>
                                        <p class="text-lg text-center font-medium ml-2 ">
                                            Números Disponíveis
                                        </p>

                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="w-full h-24 min-h-0 min-w-0 mb-4">
                            <div class="p-2 ">
                                <a href="/">
                                <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">

                                    <i class="fad fa-phone-plus"></i>
                                    <div>
                                        <p class="text-lg text-center font-medium ml-2 ">
                                            Adicionar um número
                                        </p>

                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                            @endif

                        <div class="w-full h-24 min-h-0 min-w-0 mb-4">
                            <div class="p-2 ">
                                <a href="/logout">
                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">

                                        <i class="fad fa-sign-out text-lg"></i>
                                        <div>
                                            <p class="text-lg text-center font-medium ml-2 ">
                                                Sair
                                            </p>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="border h-full w-full lg:flex-1 px-3 min-h-0 min-w-0">

                        <!-- overflow content right -->
                        <div class="w-full h-full min-h-0 min-w-0 overflow-auto">





                                           <table>
                                               <thead class="bg-gray-50">
                                               <tr>
                                                   <th scope="col" class="px-6 py-3 rounded-lg rounded-b-none text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                       <b>Última Menssagem:</b>
                                                   </th>
                                                   <th scope="col" class=" px-6 py-3 rounded-lg rounded-b-none text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                       <b>{{$d->To}}</b>
                                                   </th>
                                               </tr>
                                               </thead>

                                           </table>
                                           <div class="bg-gray-100 w-full h-full min-h-0 min-w-0 overflow-auto rounded-lg rounded-tl-none">
                                               <p class="p-5" style="max-height: 500px; overflow: auto">
                                                   <textarea style="min-height: 400px;" class="w-full rounded-2xl" disabled  name="message">{{$d->Body}}</textarea>
                                               </p>
                                               <div class="p-10 bottom-10 absolute">

                                                       <span>Enviado a: <b>{{$d->created_at}}</b></span>
                                                   <i class="ml-3 fal fa-paper-plane"></i>

                                               </div>
                                           </div>
                        </div>
                                   @else
                            <div class="border h-full w-full lg:flex-1 px-3 min-h-0 min-w-0">

                                <div class="grid grid-flow-col grid-cols-3 grid-rows-3 gap-4">
                                    <div>
                                        <div class=" w-full h-24 min-h-0 min-w-0 mb-4">
                                            <div class="p-2 ">
                                                <a href="/sendSMS">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">

                                                        <i class="fad fa-paper-plane"></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Enviar menssagens / contrato
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{--ICON 2   --}}
                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                                <a href="/lista">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fad fa-users"></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Criar uma lista
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ICON 3 --}}
                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                                <a href="/phone">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fas fa-phone fill-current"> </i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Ver Números
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ICON 4 --}}
                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4">
                                            <div class="p-2 ">
                                                <a href="/recivedsms">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fad fa-inbox"></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Menssagens / contratos recebidos
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ICON  5 --}}
                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                                <a href="/sendlist">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fad fa-mail-bulk"></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Enviar menssagem para lista
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{--ICON 6 --}}
                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                                <a href="/addphone">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fad fa-phone-plus"></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Gerir números
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ICON 7  --}}
                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                                <a href="/enviadas">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fad    fa-share-square fill-current" ></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Gerir menssagens / contratos enviados
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ICON 8 --}}

                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                                <a href="/editlist">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fad fa-user-cog"></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Gerir listas
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ICON 9 --}}
                                    <div>
                                        <div class="w-full h-24 min-h-0 min-w-0 mb-4"><div class="p-2 ">
                                                <a href="/settings">
                                                    <div class=" flex items-center p-4 bg-gray-800 rounded-lg shadow-xl cursor-pointer hover:bg-gray-700 hover:text-gray-100 text-white">
                                                        <i class="fad fa-cogs"></i>
                                                        <div>
                                                            <p class="text-lg text-center font-medium ml-2 ">
                                                                Definições de conta
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif



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

