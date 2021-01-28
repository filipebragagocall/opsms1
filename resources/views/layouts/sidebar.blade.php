<aside class="sm:h-full sm:w-16 w-full h-12 bg-gray-800 text-gray-200">
    <ul class="text-center flex flex-row sm:flex-col w-full">
        <li class="h-14 border-b border-gray-900 hidden sm:block">
            <a id="page-icon" href="/" class="h-full w-full hover:bg-gray-700 block p-3">
                <img class="object-contain h-full lg:w-full" src="https://cdn3.iconfinder.com/data/icons/fitness-and-health-7/48/56-512.png"
                     alt="open-source" />
            </a>
        </li>

        <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Enviar uma SMS">
            <a id="page-icon" href="/sendSMS" class="h-full w-full hover:bg-gray-700 block p-3">
                <i class="fad fa-paper-plane"></i>
            </a>
        </li>

        <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Sms recebidas">
            <a id="page-icon" href="/recivedsms" class="h-full w-full hover:bg-gray-700 block p-3" >
                <i class="fad fa-inbox"></i>
            </a>
        </li>
        <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Enviadas">
            <a id="page-icon" href="/enviadas" class="h-full w-full hover:bg-gray-700 block p-3">
                <i class="fad    fa-share-square fill-current" ></i>
            </a>
        </li>
        @if(auth()->user()->Admin)

        <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Números disponiveis">
            <a id="page-icon" href="/phone" class="h-full  w-full hover:bg-gray-700 block p-3">
                <i class="fa  fa-phone fill-current"></i>
            </a>
        </li>
        <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Adicionar um novo Número">
            <a id="page-icon" href="/addphone" class="h-full  w-full hover:bg-gray-700 block p-3">
                <i class="fad fa-phone-plus fill-current"> </i>
            </a>
        </li>
            <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="CLEAR CACHE">
                <a id="page-icon" href="/clear" class="h-full  w-full hover:bg-gray-700 block p-3">
                    <i class="fas fa-trash fill-current"></i>
                </a>
            </li>
            @endif

    </ul>
</aside>
