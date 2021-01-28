<nav class="border-b bg-white px-6 py-2 flex items-center min-w-0 h-14">
    <script src="{{ asset('js/help.js') }}" defer></script>

    <h1 class="font-semibold text-lg"></h1>

    <style>
        /* since nested groupes are not supported we have to use
           regular css for the nested dropdowns
        */
        li>ul                 { transform: translatex(-100%) scale(0) }
        li:hover>ul           { transform: translatex(-101%) scale(1) }
        li > button svg       { transform: rotate(90deg) }
        li:hover > button svg { transform: rotate(270deg) }

        /* Below styles fake what can be achieved with the tailwind config
           you need to add the group-hover variant to scale and define your custom
           min width style.
             See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
             for implementation with config file
        */
        .group:hover .group-hover\:scale-100 { transform: scale(1) }
        .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
        .scale-0 { transform: scale(0) }
        .min-w-32 { min-width: 8rem }
    </style>



    <span class="flex-1"></span>
    <span class="mr-4">
        @if(!Auth::guest())
            <div class="group inline-block">
        <button
            class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32"
        >
            <span class="pr-1 font-semibold flex-1">  {{Auth::user()->username}}</span>
            <span>
      <svg
          class="fill-current h-4 w-4 transform group-hover:-rotate-180
        transition duration-150 ease-in-out"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
      >
        <path
            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
        />
      </svg>
    </span>
        </button>
        <ul
            class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
  transition duration-150 ease-in-out origin-top min-w-32"
        >
            @if(auth()->user()->Admin)
                <li class="px-3 py-1 hover:bg-gray-100"><a href="Mynumbers">Admin</a></li>
            @endif
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="settings">Definições de conta</a></li>
            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                <button
                    class="w-full text-left flex items-center outline-none focus:outline-none"
                >
                    <svg
                        class="fill-current h-4 w-4
            transition duration-150 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                    >
            <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
            />
          </svg>
                    <span class="pr-1 flex-1">Conta</span>
                    <span class="mr-auto">

        </span>
                </button>
                <ul
                    class="bg-white border rounded-sm absolute top-0 left-0
  transition duration-150 ease-in-out origin-top-right
  min-w-32
  "
                >

                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                        <button
                            class="w-full text-left flex items-center outline-none focus:outline-none"
                        >
                                  <svg
                                      class="fill-current h-4 w-4
                transition duration-150 ease-in-out"
                                      xmlns="http://www.w3.org/2000/svg"
                                      viewBox="0 0 20 20"
                                  >
                <path
                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
                            <span class="pr-1 flex-1"><a href="Mynumbers">Sms</a></span>
                            <span class="mr-auto">

            </span>
                        </button>
                        <ul
                            class="bg-white border rounded-sm absolute top-0 right-0
      transition duration-150 ease-in-out origin-top-left
      min-w-32
      "
                        >
                            <li class="px-3 py-1 hover:bg-gray-100"><a href="Mynumbers">Enviados</a></li>
                            <li class="px-3 py-1 hover:bg-gray-100">Recebidos</li>
                        </ul>
                    </li>
                      @if(auth()->user()->Admin)
                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                        <button
                            class="w-full text-left flex items-center outline-none focus:outline-none"
                        >
                             <svg
                                 class="fill-current h-4 w-4
                transition duration-150 ease-in-out"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20"
                             >
                <path
                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
                            <span class="pr-1 flex-1"><a href="Mynumbers">Números</a></span>
                            <span class="mr-auto">

            </span>
                        </button>
                        <ul
                            class="bg-white border rounded-sm absolute top-0 right-0
      transition duration-150 ease-in-out origin-top-left
      min-w-32
      "
                        >
                            <li class="px-3 py-1 hover:bg-gray-100"><a href="addphone">Adicionar</a></li>
                            <li class="px-3 py-1 hover:bg-gray-100"><a href="mynumbers">Actuais</a></li>
                        </ul>
                    </li>
                          @endif
                </ul>
            </li>
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a class="ml-0.5" href="logout"><i class="fad fa-sign-out text-lg"></i> Logout </a></li>
        </ul>
    </div>
        @else
    <button
        onclick="window.location.href='/login"

        class="ml-auto border rounded-full ml-2 w-10 h-10 text-center leading-none text-gray-200 bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
        <i class="fas fa-user fill-current"></i>
    </button>
            @endif
</nav>
