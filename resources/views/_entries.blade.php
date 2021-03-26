@foreach ($posts as $post)
<div class="flex {{ $loop->last ? '' : 'border-b border-b-gray-400' }} w-full bg-gray-200 rounded-md mb-8">
    <div x-data="{ currentTab: 'first' }">
        <div>

            <div class="p-4">
                <h5 class="font-bold mb-4">
                    <a class="flex text-lg text-blue-500" 
                    href="/boletin/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h5>
                    <p class="mb-3">
                        {!! substr(strip_tags($post->body), 0, 400) !!} {!! strlen(strip_tags($post->body)) > 75 ? "..." : "" !!}
                    </p>

                    <a href="/boletin/{{ $post->id }}" 
                        class="bg-gray-800 uppercase text-sm tracking-tight text-white transition ease-in-out hover:bg-gray-500 p-2 rounded-md shadow-md"
                    >
                        Leer más
                    </a>
            </div>

        </div>

    </div>
</div>
@endforeach