<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

<aside class="sm:h-full sm:w-16 w-full h-12 bg-gray-800 text-gray-200">
    <ul class="text-center flex flex-row sm:flex-col w-full">
        <li class="h-14 border-b border-gray-900 hidden sm:block">
            <a id="page-icon" href="/" class="h-full w-full hover:bg-gray-700 block p-3">
               <img src=" {{asset('image/GoSms.svg')}}">
            </a>
        </li>

        @if(auth()->user()->username !== "Briefing" && auth()->user()->email !=="Briefing@gocall.pt" )
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
            <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Criar uma nova lista">
            <a id="page-icon" href="/lista" class="h-full  w-full hover:bg-gray-700 block p-3">
                <i class="fad fa-users"></i>
            </a>
        </li>
            <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Enviar menssagem para a lista">
                <a id="page-icon" href="/sendlist" class="h-full  w-full hover:bg-gray-700 block p-3">
                    <i class="fad fa-mail-bulk"></i>
                </a>
            </li>
            <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Status das menssagens enviadas">
                <a id="page-icon" href="/statuslist" class="h-full  w-full hover:bg-gray-700 block p-3">
                    <i class="fad fa-info-circle"></i>
                </a>
            </li>
            <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Gerir Listas">
                <a id="page-icon" href="/editlist" class="h-full  w-full hover:bg-gray-700 block p-3">
                    <i class="fad fa-user-cog"></i>
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
        @else
            <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Enviar uma SMS">
                <a id="page-icon" href="/briefing" class="h-full w-full hover:bg-gray-700 block p-3">
                    <i class="fad fa-paper-plane"></i>
                </a>
            </li>
        @endif
    </ul>
</aside>
