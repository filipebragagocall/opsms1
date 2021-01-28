<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

@if (!Auth::guest())

    @if(!session('suc'))
        <div class="h-screen w-screen bg-gray-200 flex flex-col-reverse sm:flex-row min-h-0 min-w-0 overflow-hidden">

            @include("layouts.sidebar")
            <main class="sm:h-full flex-1 flex flex-col min-h-0 min-w-0 overflow-auto">
                @include('layouts.guest')
                <section class="flex-1 pt-3 md:p-6 lg:mb-0 lg:min-h-0 lg:min-w-0">
                    <form action="addphone" method="post">
                        @csrf
                        <div class="flex flex-col lg:flex-row h-full w-full">

                            <div class="border pb-2 lg:pb-0 w-full lg:max-w-sm px-3 flex flex-row lg:flex-col flex-wrap lg:flex-nowrap">

                                <!-- control content left -->
                                <div class="w-full bg-gray-300  min-h-0 min-w-0 rounded-2xl ">
                                    <p class="p-4  justify-center">
                                        Para adicionar um novo número deverá adicionar o mesmo no campo ao lado. <br>
                                        Será enviado uma menssagem de confirmação, a qual terá de inserir no campo seguinte.
                                        caso não seja recebida nenhuma menssagem deverá confirmar novamente.<br><br>
                                        <b> Deverá inserir um número com no máximo 13 caractéres (Incluindo código de pais ex:+351...)</b>
                                    </p>
                                    </div>



                            </div>

                            <div class="border h-full w-full lg:flex-1 px-3 min-h-0 min-w-0">

                                <!-- overflow content right -->

                                <div class="bg-gray-100 w-full h-64 min-h-0 min-w-0 overflow-auto rounded-lg rounded-tl-none">
                                    <div class="w-full h-24 min-h-0 min-w-0 rounded-2xl"> <table class=" rounded-2xl min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="rounded-lg rounded-b-none px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <b>Número a ser adicionado</b>
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-100">
                                            <tr>
                                                <td class="px-6 py-4  bg-gray-100 rounded-lg rounded-t-none">
                                                    <div class="flex items-center">
                                                        <div class="w-1/3">
                                                            <div class="ml-3 text-sm font-medium text-gray-900 w-full">
                                                                <div class= "relative text-gray-600 w-full">
                                                                    @include('Countrycode.countrycode')
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/2">
                                                            <div class="text-sm font-medium text-gray-900 w-full">
                                                                <div class="relative text-gray-600 w-full">
                                                                    <input  maxlength="16" type="text" name="phone" placeholder="Número de telefone" class="w-full bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                                                                    <button disabled type="button"  class="absolute right-0 top-0.5 mt-3 mr-4">
                                                                        <i class="fad fa-phone-plus fill-current"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (session('err'))

                                                        <ul>
                                                            <b><li  class="ml-5 mt-2">{{session('err')}} </li></b>

                                                        </ul>

                                                    @endif
                                                    @if (isset($errors) && count($errors))

                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <b><li class="ml-5 mt-2">{{ $error }} </li></b>
                                                            @endforeach
                                                        </ul>

                                                    @endif
                                                    @if (isset($erros))

                                                        <ul>
                                                            @foreach($erros as $error)
                                                                <b><li class="ml-5 mt-2">{{ $error }} </li></b>
                                                            @endforeach
                                                        </ul>

                                                    @endif
                                                    <div class="p-8">
                                                        <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                                            <i class="fa fa-paper-plane mr-2"></i>
                                                            <span>Enviar</span>
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </section>


                @include('layouts.footer')
            </main>
            </form>

        </div>
    @else
        {{--        @include("layouts.sidebar")--}}
        {{--            @include('layouts.guest')--}}
        <main class="antialiased bg-gray-200 text-gray-900 font-sans overflow-x-hidden">
            <div class="relative px-4 min-h-screen md:flex md:items-center md:justify-center">
                <div class="bg-black opacity-25 w-full h-full absolute z-10 inset-0"></div>
                <div class="bg-white rounded-lg md:max-w-md md:mx-auto p-4 fixed inset-x-0 bottom-0 z-50 mb-4 mx-4 md:relative">
                    <div class="md:flex items-center">
                        <div class="rounded-full border border-gray-300 bg-green-300 flex items-center justify-center w-16 h-16 flex-shrink-0 mx-auto">
                            <i class="fa fa-check fa-2x "></i>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6 text-center md:text-left">
                            <p class="font-bold">Número adicionado
                            </p>
                            <p class="text-sm text-gray-700 mt-1">O número foi adicionado com sucesso
                            </p>
                        </div>
                    </div>
                    <div class="text-center md:text-center mt-4 md:flex md:justify-center">
                        <a href="/addphone"><button class="ml-3 block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-green-200 text-green-700 rounded-lg font-semibold text-sm md:ml-2 md:order-2">
                                OK</button></a>
                    </div>
                </div>
            </div>
        </main>

        {{--        @include('layouts.footer')--}}

    @endif
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

    </body>


