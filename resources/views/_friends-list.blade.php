<h3 class="font-bold text-xl mb-4">Siguiendo</h3>
<ul>
    @forelse (current_user()->follows as $user)
    <li class="{{ $loop->last ? '' : 'mb-4' }}">
        <div>
            <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                <img 
                    src="{{ $user->avatar }}" 
                    alt=""
                    class="rounded-full mr-2"
                    width="40"
                    height="40"
                >
                {{ $user->name }}
            </a>
        </div>
    </li>
    @empty
        <li>No estás siguendo a nadie, <a class="underline text-purple-600" href="/explore#servidores">busca a quien seguir</a><span style='font-size:25px; padding-left: 5px;'>&#128587;</span></li>
    @endforelse
</ul>