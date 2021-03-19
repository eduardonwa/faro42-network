@foreach ($posts as $post)
<div class="flex {{ $loop->last ? '' : 'border-b border-b-gray-400' }} w-full bg-gray-200 rounded-md mb-8">
    <div x-data="{ currentTab: 'first' }">
        <div>

            <div class="p-4">
                <h5 class="font-bold mb-4">
                    <a class="flex font-semibold text-blue-500 text-lg transition ease-in-out hover:underline hover:text-black" 
                    href="/boletin/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h5>
                    <p class="mb-3">
                        {!! $post->body !!}
                    </p>
            </div>

        </div>

    </div>
</div>
@endforeach