<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <form   method="POST" 
                    action="{{ $user->path() }}"
                    enctype="multipart/form-data"
                    id="update-banner"
            >
            @csrf
            @method('PATCH')
            
            <x-banner-button :user="$user"></x-banner-button>

            </form>
            <img 
                src="{{ ((Auth::user()->banner) && (Storage::disk('public')->exists('img/'.Auth::user()->banner))) ? (Storage::url('img/'.Auth::user()->banner)) : '/img/default-banner-profile.png' }}"
                alt="Banner"
                class="mb-2"
                id="user-banner"
            >
            <img 
                src="{{ $user->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2 mb-8 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%;"
                width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px;">
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Se unió {{ $user->created_at->diffForHumans() }} </p>
            </div>

            <div class="flex ">
                @can('edit', $user)
                    <a  href="{{ $user->path('edit') }}" 
                        class="rounded-full border border-gray-300 py-2 px-2 text-xs mr-2"
                    >
                        Editar Perfil
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            The name's Bugs. Bugs Bunny. Don't wear it out. Bugs is an anthropomorphic gray 
            and white rabbit or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster.
            and his catch phrase "Eh ... What's up, doc?"
        </p>
    
    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])

</x-app>