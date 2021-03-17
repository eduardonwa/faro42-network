<ul>
    <li>
        <a 
            class="font-bold text-lg mb-4 block text-gray-100 md:text-black"
            href="/home"
        >
            Inicio
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block text-gray-100 md:text-black"
            href="/explore"
        >
            Boletín
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block text-gray-100 md:text-black"
            href="#"
        >
            Notifications
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block text-gray-100 md:text-black"
            href="#"
        >
            Messages
        </a>
    </li>

    <li>
        <a 
            class="font-bold text-lg mb-4 block text-gray-100 md:text-black"
            href="{{ route('profile', auth()->user()) }}"
        >
            Perfil
        </a>
    </li>
    
    <li>
        <form method="POST" action="/logout">
            @csrf
            <button class="font-bold text-lg mb-4 text-left text-gray-100 md:text-black">Cerrar sesión</button>
        </form>
    </li>
</ul>