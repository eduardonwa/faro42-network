    <form   
        method="POST" 
        action="{{ $user->path() }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PATCH')

    @if (current_user()->is($user))
        <div    
            class="flex items-center justify-center absolute top-1 right-1 p-2 rounded-md w-full h-full"
            x-data="{ show: false }">
                <input  
                    class="hidden"
                    type="file"
                    name="banner"
                    id="banner"
                    x-on:click="show = true"
                >
                <div 
                    class="space-x-2 w-full flex items-center justify-center" 
                    x-show.transition.duration.2000ms="show"
                    >
                    <button 
                        type="submit" 
                        class="border-2 border-gray-600 bg-gray-300 bg-opacity-25 text-sm p-2 rounded-sm hover:border-blue-600 hover:bg-blue-600 hover:text-white"
                        href="index.html"
                    >
                        Guardar cambios
                    </button>
                    <a
                        class="border-2 border-gray-600 bg-gray-300 bg-opacity-25 text-sm p-2 rounded-sm hover:border-red-600 hover:bg-red-600 hover:text-white"
                        href="{{ $user->path() }}"
                    >
                        Cancelar
                    </a>
                </div>
        </div>
    @endif
    </form>