<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

@if (!Auth::guest())

    @if(!session('suc'))
        <div class="h-screen w-screen bg-gray-200 flex flex-col-reverse sm:flex-row min-h-0 min-w-0 overflow-hidden">

            @include("layouts.sidebar")
            <main class="sm:h-full flex-1 flex flex-col min-h-0 min-w-0 overflow-auto">
                @include('layouts.guest')
                <section class="flex-1 pt-3 md:p-6 lg:mb-0 lg:min-h-0 lg:min-w-0">
                    <form action="sendbriefing" method="post">
                        @csrf
                        <div class="flex flex-col lg:flex-row h-full w-full">

                            <div class="border pb-2 lg:pb-0 w-full lg:max-w-sm px-3 flex flex-row lg:flex-col flex-wrap lg:flex-nowrap">

                                <!-- control content left -->
                                <div class="w-full h-24 min-h-0 min-w-0 rounded-2xl"> <table class=" rounded-2xl min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="rounded-lg rounded-b-none px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <b>Para:</b>
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                        <tr>
                                            <td class="px-6 py-4  bg-gray-100 rounded-lg rounded-t-none">
                                                <div class="flex items-center">
                                                    <div class="w-full">
                                                        <div class="text-sm font-medium text-gray-900 w-full">
                                                            {{--                                                    <b>{{$dados['id']}}</b>--}}
                                                            <div class="relative text-gray-600 w-full">
                                                                @include('Select.usergroup')
                                                                <button disabled type="button" class="absolute right-0 top-0 mt-3 mr-4">
                                                                    <i class="fa fa-phone"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table></div>



                            </div>

                            <div class="border h-full w-full lg:flex-1 px-3 min-h-0 min-w-0">

                                <!-- overflow content right -->
                                {{--                        <h1>Corpo:</h1><br>--}}
                                <table>
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 rounded-lg rounded-b-none text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <b>Menssagem:</b>
                                        </th>

                                    </tr>
                                    </thead>

                                </table>
                                <div class="bg-gray-100 w-full h-full min-h-0 min-w-0 overflow-auto rounded-lg rounded-tl-none">
                                    <p class="p-5" style="max-height: 500px; overflow: auto">
                                        <textarea style="min-height: 400px;" class="w-full rounded-2xl" name="message" id="message"></textarea>
                                        {{--                                {{$dados["Body"]}}--}}
                                    </p>

                                    <div class="right-20 fixed bg-red-300 rounded-2xl  " >
                                        <div class="p-4">
                                            <ul id="sms-counter" class="alert alert-danger">
                                                <li>Codificação: <span class="encoding"></span></li>
                                                <li>Comprimento: <span class="length"></span></li>
                                                <li>Quantidade de menssagens: <span class="messages"></span></li>
                                                <li>caracteres por menssagem: <span class="per_message"></span></li>
                                                <li>Restantes: <span class="remaining"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if (session('err'))

                                        <ul>
                                            <b><li  class="ml-10">{{session('err')}} </li></b>

                                        </ul>

                                    @endif
                                    @if (isset($errors) && count($errors))

                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <b><li class="ml-10">{{ $error }} </li></b>
                                            @endforeach
                                        </ul>

                                    @endif
                                    @if (isset($erros))

                                        <ul>
                                            @foreach($erros as $error)
                                                <b><li class="ml-10">{{ $error }} </li></b>
                                            @endforeach
                                        </ul>

                                    @endif
                                    <div class="p-10 bottom-10 absolute">
                                        <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                            <i class="fa fa-paper-plane mr-2"></i>
                                            <span>Enviar</span>
                                        </button>
                                    </div>




                                    {{--       This is my fucking text area checker    --}}


                                    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
                                    <script src="{{asset('js/sms_counter.js')}}"></script>
                                    <script>
                                        $('#message').countSms('#sms-counter');
                                    </script>

                                    {{--   Fuck off                          --}}
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
                            <p class="font-bold">Menssagem Enviada
                            </p>
                            <p class="text-sm text-gray-700 mt-1">A menssagem foi enviada com Sucesso
                            </p>
                        </div>
                    </div>
                    <div class="text-center md:text-center mt-4 md:flex md:justify-center">
                        <a href="/briefing"><button class="ml-3 block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-green-200 text-green-700 rounded-lg font-semibold text-sm md:ml-2 md:order-2">
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


