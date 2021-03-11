
    <meta charset="UTF-8" />
    <title> Register </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <body class="bg-opacity-30 2xl bg-gradient-to-br from-gray-300">
    <div class="w-96 m-auto shadow-2xl bg-white border-4 rounded p-5 mt-20 ">
        <header class="justify-center flex text-center 2xl:content-center">

            <img src=" {{asset('image/GoSms.svg')}}">
        </header>

        <form  action="api/register" method="post">

            <div>
                <label class="block mb-2 text-indigo-500" for="Email">Email</label>
                <input autocomplete="off" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="Email" name="email">
            </div>
            <div>
                <label class="block mb-2 text-indigo-500" for="Phone-number">Número de telefone</label>
                <input autocomplete="off" maxlength="9" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="phone_number">
            </div>
            <div>
                <label class="block mb-2 text-indigo-500" for="username">Nome do utilizador</label>
                <input autocomplete="off" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="username">
            </div>
            <div>
                <label class="block mb-2 text-indigo-500" for="password">Password</label>
                <input autocomplete="off" class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password">
            </div>
            <div  class="justify-center flex text-center 2xl:content-center">
                <input class="self-center ml-0 bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="submit" value="Registar">
            </div>

        </form>
    </div>
    </body>
