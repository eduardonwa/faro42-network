<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img 
                src="{{ $user->banner }}"
                alt="Banner"
                id="previewBanner"
                class="mt-4 mb-8 rounded-md"
            >

            <img 
                src="{{ $user->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2 mb-8 md:mb-0 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%;"
                width="150"
            >
        </div>

        <div class="flex justify-between items-center md:mt-0 mb-6 mt-20">
            <div style="max-width: 270px;">
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Se unió hace {{ $user->created_at->diffForHumans() }} </p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a  href="{{ $user->path('edit') }}" 
                        class="rounded-full border border-gray-300 py-2 px-2 text-xs mr-2 transition ease-in-out hover:bg-blue-600 hover:text-white"
                    >
                        Editar Perfil
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <div x-data="{currentTab: 'first'}">
            <div class="h-12 w-auto bg-blue-100 flex space-x-4 mb-3">
                <button class="pl-5" x-on:click="currentTab = 'first'" :class="{ 'font-bold bg-opacity-5' : currentTab === 'first' }">Perfil</button>
                <button class="" x-on:click="currentTab = 'second'" :class="{ 'font-bold bg-opacity-5' : currentTab === 'second' }">Seguidos</button>
            </div>

            <div x-show="currentTab === 'first'">
                <div class="mb-6">
                    <p class="text-sm">
                        {{ $user->bio }}
                    </p>
                </div>

                <div class="mt-8">
                    @if(current_user()->is($user))
                        @include('_publish-tweet-panel')
                    @endif
                
                    @include('_timeline', [
                        'tweets' => $tweets
                    ])
                </div>
            </div>

            <div x-show="currentTab === 'second'">
                <div class="mt-3">
                    @include('_friends-list')
                </div>
            </div>
        </div>
    </header>
</x-app>