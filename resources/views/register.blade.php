<meta charset="UTF-8" />
<title> Register </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<body class="bg-opacity-50 bg-black">
<div class="w-full max-w-xs m-auto bg-indigo-100 rounded p-5 mt-24">
    <header>
        <img class="w-20 mx-auto mb-5" src="https://www.flaticon.com/svg/static/icons/svg/3601/3601824.svg" />
    </header>

    <form  action="api/register" method="post">
        @csrf
        <div>
            <label class="block mb-2 text-indigo-500" for="Email">Email</label>
            <input autocomplete="off" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="Email" name="email">
        </div>
        <div>
            <label class="block mb-2 text-indigo-500" for="Phone-number">Phone-number</label>
            <input autocomplete="off" maxlength="9" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="phone_number">
        </div>
        <div>
            <label class="block mb-2 text-indigo-500" for="username">Username</label>
            <input autocomplete="off" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="username">
        </div>
        <div>
            <label class="block mb-2 text-indigo-500" for="password">Password</label>
            <input autocomplete="off" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password">
        </div>
        <div>
            <input class="w-full bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="submit">
        </div>

    </form>
</div>
</body>
