@can('review_posts')
    <div class="px-4" id="refresh">
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
            </div>
            <div class="w-1/6 relative mx-1 w-full">
                <select wire:model="sortAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="1">Ascendiente</option>
                    <option value="0">Descendiente</option>
                </select>
            </div>

            @can('delete_posts') 
                <div class="w-1/6 relative mx-1 w-full">
                    <button wire:click="deletePost" class="flex items-center justify-center block appearance-none w-full md:h-12 bg-red-500 text-white text-sm py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 hover:bg-red-700">
                        Eliminar publicación
                    </button>
                </div>
            @endcan

        </div>

        @if($posts->isNotEmpty())

        <table class="table-auto w-full mb-6 px-6">
            <thead>
                <tr>
                    <th class="px-4 py-2"></th>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2 flex items-center justify-center">
                        <button
                            onclick="$modals.show('category-crud-modal')"
                        >
                        <svg 
                            class="w-4 cursor-pointer mr-4"
                            viewBox="0 0 20 20" 
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                                <g id="icon-shape">
                                    <path d="M15,9 L12,9 L12,11 L15,11 L15,14 L17,14 L17,11 L20,11 L20,9 L17,9 L17,6 L15,6 L15,9 Z M0,3 L10,3 L10,5 L0,5 L0,3 Z M0,11 L10,11 L10,13 L0,13 L0,11 Z M0,7 L10,7 L10,9 L0,9 L0,7 Z M0,15 L10,15 L10,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg>
                        </button>
                        Categoría
                    </th>
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
                                
                                @can('delete_posts') 
                                    <form method="POST" action="faro/{{$post->id}}">
                                        @csrf
                                        @method('DELETE')
                                            <button 
                                                class="danger-btn" 
                                                type="submit" 
                                                onclick="return confirm('¿Estas seguro de continuar?')"> 
                                                    <svg
                                                        class="w-4 cursor-pointer mr-4"
                                                        viewBox="0 0 20 20" 
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                                                            <g id="icon-shape">
                                                                <path d="M2,2 L18,2 L18,4 L2,4 L2,2 Z M8,0 L12,0 L14,2 L6,2 L8,0 Z M3,6 L17,6 L16,20 L4,20 L3,6 Z M8,8 L9,8 L9,18 L8,18 L8,8 Z M11,8 L12,8 L12,18 L11,18 L11,8 Z" id="Combined-Shape"
                                                                ></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                            </button>
                                    </form>
                                @endcan

                                @can('edit_posts')
                                    <a href="faro/{{$post->id}}/edit">
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
                                @endcan

                                <div class="flex items-center justify-center">
                                    <a href="boletin/{{ $post->id }}" class="hover:font-semibold hover:underline hover:text-green-500 cursor-pointer text-sm">
                                        {{ $post->title }}
                                    </a>
                                </div>

                            </div>
                        </td>

                        <td class="border px-4 py-2 text-sm">
                            @can('edit_posts')
                                @if ($post->category === null)
                                    <p>No hay categorías asignadas, 
                                        <a 
                                            href="faro/{{$post->id}}/edit"
                                            class="text-purple-500 hover:underline pl-1"
                                        >
                                            puedes asignar una
                                            <span class="font-size:25px; padding-left: 5px;">
                                                &#x1F913; aquí
                                                
                                            </span>
                                        </a> 
                                    </p>
                                @else
                                    {{ $post->category->name }}
                                @endif
                            @endcan

                                <x-faro-modal hash="category-crud-modal" type="categories">
                                    <x-category-tabs>

                                        <x-slot name="tabLinks">
                                            <button 
                                                class="border rounded-bl-none border-b-0 rounded-br-none border-blue-500 p-2 w-24 md:w-32 rounded-xl hover:bg-gray-200 transition ease-in-out"
                                                :class="{'bg-gray-200' : currentTab === 'index'}"
                                                x-on:click="currentTab = 'index'"
                                            >
                                                Categorías
                                            </button>

                                            <button 
                                                class="border rounded-bl-none border-b-0 rounded-br-none border-blue-500 p-2 w-24 md:w-32 rounded-xl hover:bg-gray-200 transition ease-in-out"
                                                :class="{'bg-gray-200' : currentTab === 'create'}"
                                                x-on:click="currentTab = 'create'"
                                            >
                                                Crear
                                            </button>
                                        </x-slot>
                                        
                                        <x-slot name="index">
                                            @if ($categoryUpdated)
                                                <div class="text-sm p-4 bg-blue-200 rounded-md w-full h-8 mt-4 flex items-center justify-between">
                                                    {{ $categoryUpdated }}
                                                    <button 
                                                        type="button" 
                                                        wire:click="$set('categoryUpdated', null)" 
                                                        class="cursor-pointer text-xl relative right-0 hover:text-white transition ease-in-out"
                                                    >
                                                        &times;
                                                    </button>
                                                </div>
                                            @endif

                                            @if ($categoryDeleted)
                                                <div class="text-sm p-4 bg-yellow-200 rounded-md w-full h-8 mt-4 flex items-center justify-between">
                                                    {{ $categoryDeleted}}
                                                    <button 
                                                        type="button" 
                                                        wire:click="$set('categoryDeleted', null)" 
                                                        class="cursor-pointer text-xl relative right-0 hover:text-white transition ease-in-out"
                                                    >
                                                        &times;
                                                    </button>
                                                </div>
                                            @endif

                                            @foreach ($categories as $category)
                                                <div class="mt-6 flex flex-col items-center justify-center md:flex-row md:space-x-2 p-4 hover:bg-gray-200 active:bg-green-700 transition ease-in-out">
                                                    <input
                                                        class="text-sm w-56"
                                                        type="text"
                                                        name="name"
                                                        id="name"
                                                        value="{{ $category->name }}"
                                                    >

                                                    <div class="mt-2 md:mt-0">
                                                        <button
                                                            wire:click="update({{ $category->id }})"
                                                            type="submit"
                                                            class="md:bg-gray-500 bg-blue-500 text-white text-sm p-2 rounded-md hover:bg-blue-500 transition ease-in-out"
                                                        >   
                                                            Actualizar
                                                        </button>

                                                        <button 
                                                            wire:click="deleteCategory({{ $category->id }})"
                                                            class="md:bg-gray-500 bg-red-500 text-white text-sm p-2 rounded-md hover:bg-red-500 transition ease-in-out"
                                                        >
                                                            Borrar
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </x-slot>

                                        <x-slot name="create">
                                            <div>
                                                @if ( $categorySuccess)
                                                    <div class="text-sm p-4 bg-green-200 rounded-md w-full h-8 mt-4 flex items-center justify-between">
                                                        {{ $categorySuccess }}
                                                        <button 
                                                            type="button" 
                                                            wire:click="$set('categorySuccess', null)" 
                                                            class="cursor-pointer text-xl relative right-0 hover:text-white transition ease-in-out"
                                                        >
                                                            &times;
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                                <form
                                                    class="mt-6 flex flex-col p-4 space-y-4"
                                                    wire:submit.prevent="submitCategory"
                                                    action="#"
                                                    method="POST"
                                                >
                                                <label 
                                                    class="font-semibold"
                                                    for="name">
                                                    Nombre de categoría
                                                </label>

                                                <input 
                                                    wire:model="name"
                                                    class="@error('name') border border-red-500 @enderror w-full"
                                                    type="text"
                                                    name="name"
                                                    id="name"
                                                    value="{{ old('name') }}"
                                                    required
                                                >
                                                <div>
                                                    @error('name')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <label 
                                                    class="font-semibold"
                                                    for="description">
                                                    Breve descripción
                                                </label>
                                                <textarea 
                                                    wire:model="description"
                                                    name="description" 
                                                    id="description" 
                                                    class="@error('description') border border-red-500 @enderror resize-none"
                                                    rows="2"
                                                    value="{{ old('description') }}"
                                                > </textarea>

                                                <div>
                                                    @error('description')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <button 
                                                    class="bg-green-500 rounded-md p-2 hover:bg-green-700 hover:text-white transition ease-in-out"
                                                    type="submit"
                                                >
                                                    Guardar
                                                </button>
                                            </form>
                                        </x-slot>

                                    </x-category-tabs>
                                </x-faro-modal>
                        </td>

                        <td 
                            class="border px-4 py-2 flex items-center justify-center"
                        >
                            <button
                                onclick="$modals.show('faro-posts-img-modal-{{ $post->id }}')"
                                class="bg-blue-100 border-2 border-blue-500 text-sm rounded-md p-1 text-blue-500 hover:bg-blue-500 hover:border-none hover:text-white transition ease-in-out"
                            >
                                Mostrar
                            </button>

                            <x-faro-modal hash="faro-posts-img-modal-{{$post->id}}" type="images">
                                <div class="relative block h-full w-full overflow-hidden">
                                    <div    
                                        class="abs-slider" 
                                        data-manual="true"
                                    >
                                            @foreach($post->images as $image)
                                                <div class="abs-slider-container overflow-x-auto flex flex-col items-center justify-center absolute inset-y-0 overflow-hidden h-auto w-full left-full">
                                                    <img 
                                                        src="{{ $image->name }}" 
                                                        alt="gallery" 
                                                        class="md:p-20 p-0 w-auto h-full mx-auto overflow-hidden">
                                                </div>
                                            @endforeach
                                            
                                            <div class="abs-slider-prev z-11 absolute block w-11 h-11 text-center leading-8 text-2xl cursor-pointer rounded-full opacity-70 hover:opacity-100 -translate-y-1/2 top-24 -left-3 md:top-80 md:left-4">
                                                <x-left-chevron/>
                                            </div>

                                            <div class="abs-slider-next z-11 absolute block w-11 h-11 text-center leading-8 text-2xl cursor-pointer rounded-full opacity-70 hover:opacity-100 -translate-y-1/2 top-24 -right-3 md:top-80 md:right-4">
                                                <x-right-chevron/>
                                            </div>
                                    </div>
                                </div>
                            </x-faro-modal>
                        </td>

                        <td class="border px-4 py-2 text-sm">
                            {{ $post->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $posts->links() !!}
        @else
            @can('create_posts')
                <p 
                    class="text-center flex items-center justify-center"
                >   Oops! No existen publicaciones, 
                    <a 
                        href="/faro/create" 
                        class="text-purple-500 hover:underline pl-1"
                    >   haz una publicación
                    </a>
                    <span style='font-size:25px; padding-left: 5px;'>
                        &#9749;
                    </span>
                </p>
            @endcan
        @endif

    </div>
@endcan

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

<script src="{{ asset('js/gallery.js') }}"></script>