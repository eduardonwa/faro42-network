<x-app>
    <div>
        <a href="#" class="flex font-bold text-green-900 text-2xl">
            Descarga el boletín aqui
        </a>  
            <div class="mt-4">
                @foreach ($post->images as $image)
                    <img 
                        src="{{ asset($image->name) }}" 
                        class="mb-4 border-2" 
                    />
                @endforeach
                <h1 class="font-bold text-lg mb-4">{{ $post->title }}</h1>
                <p class="mb-4">{{ $post->body }}</p>
            </div>
    </div>
</x-app>