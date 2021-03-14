<x-app>
    <div>
        <a href="#" class="flex font-bold text-green-900 text-2xl">
            Descarga el boletín aqui
        </a>

        @foreach ($posts as $post)    
            <div class="mt-4">
                <img class="mb-4 border-2" src="{{ asset($post->image_url) }}" />
                <h1 class="font-bold text-lg mb-4">{{$post->title}}</h1>
                <p class="mb-4">{{$post->body}}</p>
            </div>
        @endforeach
    </div>
</x-app>