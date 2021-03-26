<div 
    class="flex p-4 border border-gray-300 rounded-lg py-4 px-6 bg-gray-100 bg-opacity-25 hover:bg-gray-100 transition ease-in-out
    {{ $loop->last ? '' : 'mb-8' }}"
>
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img 
                src="{{ $tweet->user->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>

    <div class="w-full">
        <div>
            <h5 class="font-bold mb-4">
                <a href="{{ route('profile', $tweet->user) }}">
                    {{ $tweet->user->name }}
                </a>
            </h5>
        </div>
    
        @if ($tweet->images != null)        
            <div class="grid grid-cols-2 grid-rows-1">
                @foreach($tweet->images as $images)
                    <div class="md:p-1">
                        <img
                            class="h-full w-full object-cover"
                            src="{{ asset($images->name) }}" 
                            alt="tweet images"
                        >
                    </div>
                @endforeach
            </div>
        @endif
        
        <p class="text-sm md:text-base mb-3">
            {{ $tweet->body }}
        </p>

        <x-like-buttons :tweet="$tweet"/>
    </div>
</div>