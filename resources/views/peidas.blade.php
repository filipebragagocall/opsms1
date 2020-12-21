<meta charset="UTF-8" />
<title> Peida </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body class="bg-opacity-50 bg-black">
<div class="w-96 m-auto bg-indigo-100 rounded p-5 mt-32">
<header>
    <img class="w-20 mx-auto mb-5" src="https://www.flaticon.com/svg/static/icons/svg/3601/3601824.svg" />
</header>

<form action="login" method="post">
    @csrf
    <div>
        <label class="block mb-2 text-indigo-500" for="username">Username</label>
        <input autocomplete="off" class="w-full p-2 mb-3 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="username">
    </div>
    <div>
        <label class="block mb-2 text-indigo-500" for="password">Password</label>
        <input autocomplete="off" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password">
    </div>
    @if (session('error'))
        <div class="text-red-700 mb-6 bg-red-300 rounded h-10 mt-3 text-center"><p class="p-1">{{ session('error') }}!</p></div>
    @endif
    <div class="w-full">
        <input class="ml-7 mr-5 ml-16 w-auto bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="submit">
        <a href="register"><input class="ml-4 mr-5 w-auto bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="button" value="Registar"></a>
    </div>

</form>
</div>
</body>
