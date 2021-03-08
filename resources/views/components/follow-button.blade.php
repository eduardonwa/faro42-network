@unless (current_user()->is($user))
    <form method="POST" action="{{ route('follow', $user->username) }}">
        @csrf
        <button 
                type="submit" 
                class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white text-xs"
            >
            {{ current_user()->following($user) ? 'Dejar de seguir' : 'Empezar a seguir' }}

        </button>
    </form>
@endunless