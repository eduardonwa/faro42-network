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
                        <div class="flex items-start">
                            <form method="POST" action="faro/{{$post->id}}">
                                @csrf
                                @method('DELETE')
                                    <button 
                                        class="danger-btn" 
                                        type="submit" 
                                        onclick="return confirm('¿Estas seguro de borrar el recurso?')"> 
                                            <svg
                                                class="w-4 cursor-pointer mr-4"
                                                viewBox="0 0 20 20" 
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                                                    <g id="icon-shape">
                                                        <path d="M2,2 L18,2 L18,4 L2,4 L2,2 Z M8,0 L12,0 L14,2 L6,2 L8,0 Z M3,6 L17,6 L16,20 L4,20 L3,6 Z M8,8 L9,8 L9,18 L8,18 L8,8 Z M11,8 L12,8 L12,18 L11,18 L11,8 Z" id="Combined-Shape"></path>
                        
                                                    </g>
                                                </g>
                                            </svg>
                                    </button>
                            </form>
                            <a href="faro/{{ $post->id }}/edit">
                                <svg 
                                    class="w-4 cursor-pointer mr-4"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                                        <g id="icon-shape">
                                            <path d="M12.2928932,3.70710678 L0,16 L0,20 L4,20 L16.2928932,7.70710678 L12.2928932,3.70710678 Z M13.7071068,2.29289322 L16,0 L20,4 L17.7071068,6.29289322 L13.7071068,2.29289322 Z" id="Combined-Shape"></path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <div class="flex items-center justify-center">
                                <a href="#" class="hover:font-semibold hover:underline hover:text-green-500 cursor-pointer text-sm">
                                    {{ $post->title }}
                                </a>
                            </div>
                        </div>
                    </td>

                    <td class="border px-4 py-2 text-sm">
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

                    <td class="border px-4 py-2 text-sm">
                        {{ $post->created_at->diffForHumans() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $posts->links() !!}
    @else
        <p class="text-center flex items-center justify-center">Oops! No existen publicaciones, <a href="/faro/create" class="text-purple-500 hover:underline pl-1"> haz una publicación</a><span style='font-size:25px; padding-left: 5px;'>&#9749;</span></p>
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