<div class="md:col-span-2">
    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700" 
            for="name"
    >   Nombre
    </label>

    <input  class="mb-4 border border-gray-400 p-2 w-full"
            type="text"
            name="name"
            id="name"
            value="{{ $user->name }}"
            required
    >
    @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror

    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700" 
            for="username"
    >
        Nombre de usuario
    </label>

    <input  class="border border-gray-400 p-2 w-full"
            type="text"
            name="username"
            id="username"
            value="{{ $user->username }}"
            required
    >
    @error('username')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>