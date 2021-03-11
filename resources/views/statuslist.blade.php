<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

@if (!Auth::guest())

    @if(!session('suc'))
        <div class="h-screen w-screen bg-gray-200 flex flex-col-reverse sm:flex-row min-h-0 min-w-0 overflow-hidden">

            @include("layouts.sidebar")
            <main class="sm:h-full flex-1 flex flex-col min-h-0 min-w-0 overflow-auto">
                @include('layouts.guest')
                <section class="flex-1 pt-3 md:p-6 lg:mb-0 lg:min-h-0 lg:min-w-0">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Para
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>

                            <th scope="col" class="px-6 py-3 text-center font-medium text-gray-500 uppercase tracking-wider flex items-end ">
                                <a href="/editlist" class="text-center w-full">
                                    <svg class="w-6 mt-2 outline-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if (count($lista) === 0)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap text-center" colspan="4">
                                    <b>Não tem listas a serem mostradas.</b>
                                </td>
                            </tr>
                        @endif
                        @foreach($lista as $testes)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <b>{{$testes->To}}</b>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4  whitespace-nowrap text-sm text-gray-500">
                                    <b>{{$testes->State}}</b>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    Porta: {{$testes->Port}}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="4" class="text-center p-4">
                                {{$lista->links()}}

                            </td>
                        </tr>
                        <!-- More items... -->
                        </tbody>
                    </table>

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
                        <div class="rounded-full border border-gray-300 bg-red-300 flex items-center justify-center w-16 h-16 flex-shrink-0 mx-auto">
                            <i class="fa fa-check fa-2x "></i>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6 text-center md:text-left">
                            <p class="font-bold">Grupo apagado com sucesso
                            </p>
                            <p class="text-sm text-gray-700 mt-1">O grupo foi apagado com sucesso
                            </p>
                        </div>
                    </div>
                    <div class="text-center md:text-center mt-4 md:flex md:justify-center">
                        <a href="/editlist"><button class="ml-3 block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-red-200 text-red-700 rounded-lg font-semibold text-sm md:ml-2 md:order-2">
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


