    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    
    <script>
        tinymce.init({
        selector: 'textarea#body'
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

    @error('body')
        <div class="alert alert-danger text-red-500">{{ $message }}</div>
    @enderror

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
        >
    </div>

    <div id="imgs" class="flex flex-col"></div>

    <div 
        id="container" 
        class="flex items-center justify-center space-x-4 h-auto w-full"
    >
        <div 
            id="content" 
            class="border-2 h-auto w-full flex wrap overflow-x-auto my-4"
        >
            @foreach ($post->images as $images)
                <img 
                    src="{{ asset($images->name) }}" 
                    class="w-48" 
                />
            @endforeach
        </div>

    </div>

    <div class="flex justify-center items-center my-4 space-x-8">
        <button 
            id="slideLeft"
            type="button"
        >
            <svg
                class="w-8 h-8 cursor-pointer"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                    <g id="icon-shape">
                        <polygon id="Combined-Shape" points="10 13 18 13 18 7 10 7 10 2 2 10 10 18 10 13"></polygon>
                    </g>
                </g>
            </svg>

        </button>

        <button 
            id="slideRight"
            type="button"
        >
            <svg
                class="w-8 h-8 cursor-pointer"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                    <g id="icon-shape">
                        <polygon id="Combined-Shape" points="10 7 2 7 2 13 10 13 10 18 18 10 10 2 10 7"></polygon>
                    </g>
                </g>
            </svg>

        </button>
    </div>

    <div class="rounded-md border p-4 text-sm flex flex-col items-center justify-between md:flex-row">
        <div class="flex flex-col">
            <label 
                class="font-semibold text-gray-700 my-3"
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

        <div class="m-4 relative md:top-6 md:m-0">
            <p class="p-2 border-2 border-yellow-500 rounded-sm">
                Asigna tu categoría ó 
                <a 
                    href="#"
                    class="transition ease-in-out underline text-yellow-500 md:text-black md:no-underline hover:underline hover:text-yellow-500"
                >
                    crea una nueva nueva 
                    <span class="inline-block" style="font-size:20px; padding-left: 5px;">
                        &#x1F913;
                    </span>
                </a>
            </p>
        </div>

        <x-faro-modal hash="new-category-form" type="categories">
            {{-- hacer una solicitud para un solo campo --}}
        </x-faro-modal>
    </div>

    <div 
        class="flex items-end justify-end w-full my-4"
    >
        <button
            type="submit"
            class="font-bold bg-blue-600 hover:bg-blue-500 text-sm text-white p-3 rounded-md h-12 w-34 uppercase"
        >
            Publicar
        </button>
    </div>

    <script>
        const buttonRight = document.getElementById('slideRight');
        const buttonLeft = document.getElementById('slideLeft');

        buttonRight.onclick = function () {
            document.getElementById('container').scrollLeft += 20;
        };
        buttonLeft.onclick = function () {
            document.getElementById('container').scrollLeft -= 20;
        };
    </script>

    <script>
         $("#image").on('change',function() {
            var fileList = this.files; 
                for(var i = 0; i < fileList.length; i++)
            {
                var t = window.URL || window.webkitURL;
                var objectUrl = t.createObjectURL(fileList[i]);
                $('#imgs').append(`
                    <div> 
                        <img class="h-48 border-2" src="` + objectUrl + `" /> 
                    </div>`
                );

                j = i+1;
                if(j % 3 == 0)
                {
                    $('#imgs').append('<br>');
                }
            }
        });
    </script>