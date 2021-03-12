<x-master>
    
    <h2 class="text-2xl font-bold text-center">Editar entrada</h2>

    <form
        method="POST"
        action="/faro/{{ $post->id }}"
        class="mt-8 max-w-2xl border-2 mx-auto mb-8"
        enctype="multipart/form-data"
    >   @csrf
        @method('PUT')
    <div class="grid grid-cols-1 gap-6 p-4">

    </form>

    @include('faro.form', [
        'posts' => App\Models\Faro::get()
    ])
</x-master>