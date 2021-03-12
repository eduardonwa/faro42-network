<ul>
    <li>
        <a 
            class="font-bold text-lg mb-4 block"
            href="/home"
        >
            Inicio
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block"
            href="/explore"
        >
            Servicios
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block"
            href="#"
        >
            Notifications
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block"
            href="#"
        >
            Messages
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block"
            href="{{ route('profile', auth()->user()) }}"
        >
            Perfil
        </a>
    </li>
    
    <li>
        <form method="POST" action="/logout">
            @csrf
            <button class="font-bold text-lg mb-4 text-left">Cerrar sesión</button>
        </form>
    </li>
</ul>