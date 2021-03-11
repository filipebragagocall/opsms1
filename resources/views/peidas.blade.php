<meta charset="UTF-8" />
<title> GoSms </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@if(!session('suc'))
<body class="bg-opacity-30 2xl bg-gradient-to-br from-gray-300">
<div class="w-96 m-auto shadow-2xl bg-white border-4 rounded p-5 mt-40 ">
<header class="justify-center flex">
    <img src=" {{asset('image/GoSms.svg')}}">
</header>

<form action="login" method="post">
    @csrf
    <div>
        <input autocomplete="off" placeholder="Utilizador" class="w-full p-2 mt-14 mb-3 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="username">
    </div>
    <div>
        <input autocomplete="off" placeholder="Password" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password">
    </div>
    <div class="h-24">
    @if (session('error'))
        <div class="text-red-700 mb-6 bg-red-300 rounded h-10 mt-3 text-center"><p class="p-1">{{ session('error') }}!</p></div>
    @endif
    <div class="w-full mt-3 flex content-center self-center justify-center">
        <input class=" w-auto bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-3 rounded" type="submit" value="Login">
    </div>
    </div>
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
                        <p class="font-bold">Utilizador Criado
                        </p>
                        <p class="text-sm text-gray-700 mt-1">O utilizador foi criado com sucesso, realiza login para usares a aplicação
                        </p>
                    </div>
                </div>
                <div class="text-center md:text-center mt-4 md:flex md:justify-center">
                    <a href="/peidas"><button class="ml-3 block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-green-200 text-green-700 rounded-lg font-semibold text-sm md:ml-2 md:order-2">
                            OK</button></a>
                </div>
            </div>
        </div>
    </main>

    {{--        @include('layouts.footer')--}}

@endif
</body>
