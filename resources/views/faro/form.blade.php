    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    
    <script>
        tinymce.init({
        selector: '#body'
        });
    </script>

    <label for="title" class="block">
        <span class="font-semibold text-gray-700">Título</span>
        <input
            type="text"
            name="title"
            id="title"
            class="outline-none p-1 my-3 pl-2 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            value="{{ old('title') ?? $post->title }}"
    />
    @error('title')
        <div class="alert alert-danger text-red-500">{{ $message }}</div>
    @enderror

    <label 
        for="body" 
        class="font-semibold block focus-visible:ring-2 focus-visible:ring-rose-500"    
        >
        <span class="text-gray-700">Cuerpo</span>
        <textarea
            class="outline-none pl-2 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="body"
            id="body"
            rows="20"
            required
        >{!! old('body') ?? $post->body !!}</textarea>
    </label>

    <div class="outline-none mt-3 mb-3">
        
        <label 
            for="image" 
            class="block focus-visible:ring-2 focus-visible:ring-rose-500"
        >
            <span 
                class="bg-green-600 hover:bg-green-500 h-10 w-full flex items-center justify-center rounded-md text-white text-sm p-2 cursor-pointer w-full border-2"
            >
                Agregar imágenes
            </span>

            <input
                type="file"
                name="images[]"
                id="image"
                class="hidden"
                multiple
        />

    </div>

    <div>
        @if ($post->category_id === null) 
            <div class="rounded-md border p-2 text-sm flex items-center justify-between">
                <select
                    class="border-2"
                    name="category_id" 
                    id="category_id"
                >
                <option 
                    selected
                    value="0"
                >
                </option>
                    @foreach ($categories as $category)
                        <option 
                            value="{{$category->id}}"
                            {{ $category->id == $post->category_id ? 'selected' : ''}}
                        >   
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            <p class="bg-yellow-500 p-2">
                Asigna tu categoría ó 
                <a 
                    href="#"
                    class="transition ease-in-out hover:underline hover:text-white"
                >
                    crea una nueva nueva 
                    <span class="inline-block" style="font-size:20px; padding-left: 5px;">
                        &#x1F913;
                    </span>
                </a>
            </p>
        </div>
        @else
        <div class="flex flex-col space-y-4">
            <label 
                for="category_id"
            > 
                Categorías
            </label>

            <select
                class="border-2"
                name="category_id" 
                id="category_id"
                required
            >
                @foreach ($categories as $category)
                    <option 
                        value="{{$category->id}}"
                        {{ $category->id == $post->category_id ? 'selected' : ''}}
                    >   
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        @endif

        <x-faro-modal hash="new-category-form" type="categories">
            {{-- hacer una solicitud para un solo campo? --}}
        </x-faro-modal>
    </div>

    <div 
        class="flex items-end justify-end w-full p-2"
    >
        <button
            type="submit"
            class="font-bold bg-blue-600 hover:bg-blue-500 text-sm text-white p-3 rounded-md h-auto w-34 uppercase"
        >
            Publicar
        </button>
    </div>