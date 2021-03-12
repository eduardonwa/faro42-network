<x-app>

    @include('_entries', [
        'posts' => App\Models\Faro::all()
    ])

    <h1 class="font-bold mb-10">Compañeros servidores</h1>

    <div>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
                <img    src="{{ $user->avatar }}" 
                        alt="{{ $user->username }}'s avatar"
                        width="60"
                        class="mr-4 rounded"
                >

                <div>
                    <h4 class="font-bold">{{ '@' . $user->name }}</h4>
                </div>
            </a>
        @endforeach
        {{ $users->links() }}
    </div>
</x-app>