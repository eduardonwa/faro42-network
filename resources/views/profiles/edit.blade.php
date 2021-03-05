<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <x-avatar-upload :user="$user"></x-avatar-upload>

        <x-banner-image :user="$user"></x-banner-image>

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
