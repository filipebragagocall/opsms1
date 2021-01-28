{{--@foreach ($teste as $testes)--}}
{{--    {{$testes['id']}}<br>--}}
{{--@endforeach--}}
<?php

if (isset($a)){
    $b=$a+5;
}else{
    $a=0;
    $b=5;
}
?>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
<script>
    window.onload = function java (){
        myFunction();
    }
    function myFunction() {
        setInterval(function(){ location.replace("/enviadas"); }, 20000);
    }
</script>
@if (!Auth::guest())
    <section class="h-screen w-screen bg-gray-200 flex flex-col-reverse sm:flex-row min-h-0 min-w-0 overflow-hidden">
        @include("layouts.sidebar")
        <main class="sm:h-full flex-1 flex flex-col min-h-0 min-w-0 overflow-auto ">
            @include('layouts.guest')
            <section class="flex-1 pt-3 md:p-6 lg:mb-0 lg:min-h-0 lg:min-w-0">
                <div class="flex flex-col lg:flex-row h-full w-full">

                    <div class="border h-full w-full lg:flex-1 px-3 min-h-0 min-w-0">
                        <!-- overflow content right -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Para
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Corpo
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider flex items-end">
                                    <a href="/recivedsms" class="text-right w-full">
                                        <svg class="w-6 mt-2 outline-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($teste) === 0)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center" colspan="3">
                                        <b>Não tem Menssagens enviadas.</b>
                                    </td>
                                </tr>
                            @endif
                            @foreach($teste as $testes)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> <b>{{$testes->To}}</b></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <b>{{$testes->Body}}</b>
                                    </td>

                                   <td>

                                   </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="4" class="text-center p-4">
                                    {{$teste->links()}}

                                </td>
                            </tr>
                            <!-- More items... -->
                            </tbody>
                        </table>

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


