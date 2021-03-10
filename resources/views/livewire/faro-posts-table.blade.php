<div class="px-4">
    <div class="w-full flex flex-col items-center justify-center md:flex-row pb-10 space-y-4 md:space-y-0">
        <div class="w-3/6 mx-1 w-full">
            <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Buscar publicaciones...">
        </div>
        <div class="w-1/6 relative mx-1 w-full">
            <select wire:model="sortField" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="id">ID</option>
                <option value="title">Título</option>
                <option value="created_at">Fecha publicación</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1 w-full">
            <select wire:model="sortAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="1">Ascendiente</option>
                <option value="0">Descendiente</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1 w-full">
            <button wire:click="deletePost" class="block appearance-none w-full bg-red-500 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 hover:bg-red-700">
                Eliminar publicación
            </button>
        </div>
    </div>

    @if($posts->isNotEmpty())
    <table class="table-auto w-full mb-6 px-6">
        <thead>
            <tr>
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Título</th>
                <th class="px-4 py-2">Cuerpo</th>
                <th class="px-4 py-2">Imagenes</th>
                <th class="px-4 py-2">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)

                <tr>
                    <td class="border px-4 py-2">
                        <input 
                            wire:model="selected" 
                            value="{{ $post->id }}" 
                            type="checkbox"
                        >
                    </td>

                    <td class="border px-4 py-2">
                        {{ $post->id }}
                    </td>

                    <td class="border px-4 py-2">
                        <a href="#" class="hover:font-semibold hover:underline hover:text-green-500 cursor-pointer">
                            {{ $post->title }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ substr(strip_tags($post->body), 0, 100) }} {{ strlen(strip_tags($post->body)) > 75 ? "..." : "" }}
                    </td>

                    <td 
                        class="border px-4 py-2 flex items-center justify-center"
                    >
                        <button
                            onclick="$modals.show('faro-posts-img-modal')"
                            class="bg-blue-100 border-2 border-blue-500 text-sm rounded-md p-1 text-blue-500 hover:bg-blue-500 hover:border-none hover:text-white transition ease-in-out"
                        >
                            Mostrar
                        </button>
                    </td>

                    <x-modal>
                        <x-faro-posts-img-modal hash="faro-posts-img-modal">
                            {{ $post->image_url }}
                        </x-faro-posts-img-modal>
                    </x-modal>

                    <td class="border px-4 py-2">
                        {{ $post->created_at->diffForHumans() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $posts->links() !!}
    @else
        <p class="text-center flex items-center justify-center">Ooops! No existen publicaciones, <a href="/faro/create" class="text-purple-500 hover:underline pl-1"> haz una publicación</a><span style='font-size:25px; padding-left: 5px;'>&#9749;</span></p>
    @endif
</div>

<script>
    window.$modals = {
        show(hash) {
            window.dispatchEvent(
                new CustomEvent('modal', { 
                    detail: hash
                })
            );
        }
    }
</script>