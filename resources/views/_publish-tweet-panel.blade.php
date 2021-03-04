<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea 
            name="body"
            class="w-full"
            placeholder="Hola, {{auth()->user()->name}}"
            required
            autofocus
        ></textarea>
        
        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img 
                src="{{ auth()->user()->avatar }}" 
                alt="Your avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
            <button 
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm py-2 px-2 text-white w-32 h-10"
                >
                    Publicar
            </button>
        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2"> {{ $message }} </p>
    @enderror
</div>