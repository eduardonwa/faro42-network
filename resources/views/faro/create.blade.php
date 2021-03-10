<x-master>
    
    <h2 class="text-2xl font-bold text-center">Nueva entrada</h2>

    <form
        method="POST"
        action="/faro"
        class="mt-8 max-w-2xl border-2 mx-auto mb-8"
        enctype="multipart/form-data"
    >   @csrf
    <div class="grid grid-cols-1 gap-6 p-4">

    </form>

    @include('faro.form', [
        //
    ])
</x-master>



