    <label for="title" class="block">
        <span class="text-gray-700">Título</span>
        <input
            wire:model="title"
            type="text"
            name="title"
            id="title"
            class="outline-none mt-3 p-1 mb-3 pl-2 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            value="{{ old('title') ?? $post->title }}"
    />
    @error('title')
        <div class="alert alert-danger text-red-500">{{ $message }}</div>
    @enderror

    <label 
        for="body" 
        class="block"    
    >
        <span class="text-gray-700">Cuerpo</span>
        <textarea
            wire:model="body"
            class="outline-none mt-3 p-1 mb-3 pl-2 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="body"
            id="body"
            rows="10"
            required
        >{{ old('body') ?? $post->body }}</textarea>
    </label>

    <div class="outline-none mt-3 mb-3">
        
        <label 
            for="image" 
            class="block"
        >
            <span 
                class="bg-green-600 hover:bg-green-500 h-10 w-full flex items-center justify-center rounded-md text-white text-sm p-2 cursor-pointer w-full border-2"
            >
                Agregar imágenes
            </span>

            <input
                type="file"
                name="image"
                id="image"
                class="hidden"
                multiple
        />

    </div>

    <div 
        class="flex items-end justify-end w-full p-2"
    >
        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-500 text-sm text-white p-3 rounded-md h-auto w-34 uppercase"
        >
            Publicar
        </button>
    </div>
