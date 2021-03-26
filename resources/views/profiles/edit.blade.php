<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        
        @csrf
        @method('PATCH')

        <div class="flex flex-col md:grid md:grid-cols-3 md:gap-4 mb-6">
            <div class="relative flex flex-col items-center mt-8 mb-4 md:mt-0 md:mb-0">
                <img    
                    src="{{ $user->avatar }}" 
                    alt="Your current avatar"
                    id="avatarPreview"
                    class="w-auto h-44 relative rounded-full"
                >
                <label 
                    class="cursor-pointer bg-blue-600 p-2 text-sm rounded-md hover:bg-blue-500 text-white"
                    for="avatar"
                >
                    <input
                        class="hidden"
                        type="file"
                        name="avatar"
                        id="avatar"
                        onchange="previewFile()"
                    > Cambiar avatar
                </label>
                @error('avatar')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <x-name-username :user="$user"> </x-name-username>
        </div>

        <div class="mt-8 mb-6 flex items-center justify-center flex-col">
            <label class="mb-4 w-full block uppercase font-bold text-xs text-gray-700">
                Información
            </label>
            <textarea
                class="w-full border border-gray-300 resize-none"
                name="bio" 
                id="bio" 
                rows="5"
            >{{ old('bio') ?? $user->bio }}</textarea>
        </div>

        <div class="mt-8 mb-6 flex flex-col items-center relative">
            <label class="mb-4 text-start w-full block uppercase font-bold text-xs text-gray-700" 
            > 
                Portada
            </label>
            
            <img    
                src="{{ $user->banner }}"
                alt="Tu portada actual"
                id="dvPreview2"
                class="w-full h-44 mb-2 border border-gray-300 rounded-sm"
            >

            <div class="relative w-full h-10 flex items-center justify-center md:items-end md:justify-end">
                <label 
                    class="absolute w-46 p-2 bg-blue-600 hover:bg-blue-500 text-sm rounded-md text-white cursor-pointer"
                    for="banner">
                        <input  
                            class="fileupload hidden"
                            type="file"
                            name="banner"
                            id="banner"
                            width="40"
                            onchange="previewFile()"
                        >   Cambiar imagen de portada
                </label>
            </div>
         </div>

        
        
         <div class="mb-6">
            <label  class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="email"
            >
                Email
            </label>

            <input  class="border border-gray-400 p-2 w-full"
                    type="email"
                    name="email"
                    id="email"
                    value="{{ $user->email }}"
                    required
            >
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label  class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="password"
            >
                Contraseña
            </label>

            <input  class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password"
                    id="password"
                    required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label  class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="password_confirmation"
            >
                Confirmar Contraseña
            </label>

            <input  class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
            >
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit"
                    class="bg-blue-600 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
            >
                Enviar
            </button>

            <a href="{{ $user->path() }}" class="text-white rounded py-2 px-4 bg-red-600 hover:bg-red-500">Cancelar</a>
        </div>

    </form>
</x-app>

<script>
    function previewFile() {
    const preview = document.getElementById('avatarPreview');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        // convert image file to base64 string
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
    }
</script>