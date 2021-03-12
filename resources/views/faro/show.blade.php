<x-app>
    <h1 class="flex font-bold text-green-900 text-2xl">Boletín Express</h1>

    <div>
        <a href="#" class="text-sm">
            Descarga el boletín aqui
        </a>

        @foreach ($posts as $post)    
            <div class="mt-4">
                <p>{{$post->title}}</p>
                <p>{{$post->body}}</p>
                <img src="{{ asset($post->image_url) }}" />
            </div>
        @endforeach
    </div>
</x-app>