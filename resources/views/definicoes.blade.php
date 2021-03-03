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
                                        <form class=" border-t border-gray-400 pt-4">
                                            <div class='flex flex-wrap -mx-3 mb-6'>
                                                <div class='w-full md:w-full px-3 mb-6'>
                                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Email</label>
                                                    <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' value="{{auth()->user()->email}}" type='text' placeholder='{{auth()->user()->email}}'  required>
                                                </div>
                                                <div class='w-full md:w-full px-3 mb-6 '>
                                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>password</label>
                                                    <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md ">change your password</button>
                                                </div>
                                                <div class='w-full md:w-full px-3 mb-6'>
                                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Email</label>
                                                    <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' value="{{auth()->user()->email}}" type='text' placeholder='{{auth()->user()->email}}'  required>
                                                </div>
                                                <div class='w-full md:w-full px-3 mb-6'>
                                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>fav language</label>
                                                    <div class="flex-shrink w-full inline-block relative">
                                                        <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                                                            <option>choose ...</option>
                                                            <option>English</option>
                                                            <option>France</option>
                                                            <option>Spanish</option>
                                                        </select>
                                                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="flex justify-end">
                                                        <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">save changes</button>
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

