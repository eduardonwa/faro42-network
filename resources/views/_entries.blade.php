@foreach ($posts as $post)
<div class="flex {{ $loop->last ? '' : 'border-b border-b-gray-400' }} w-full bg-gray-200 rounded-md mb-8">
    <div x-data="{ currentTab: 'first' }">
    
        <div class="h-12 w-auto rounded-md bg-blue-100 flex items-center justify-between">
            <button class="rounded-tl-md h-12 w-full hover:bg-gray-900 hover:bg-opacity-5 transition ease-in-out bg-blue-300" x-on:click="currentTab = 'first'" :class="{ 'font-bold bg-opacity-5' : currentTab === 'first' }">I.P.</button>
            <button class="h-12 w-full hover:bg-gray-900 hover:bg-opacity-5 transition ease-in-out bg-blue-300" x-on:click="currentTab = 'second'" :class="{ 'font-bold bg-opacity-5' : currentTab === 'second' }">CCCP</button>
            <button class="h-12 w-full hover:bg-gray-900 hover:bg-opacity-5 transition ease-in-out bg-blue-300" x-on:click="currentTab = 'third'" :class="{ 'font-bold bg-opacity-5' : currentTab === 'third' }">CIC</button>
            <button class="h-12 w-full hover:bg-gray-900 hover:bg-opacity-5 transition ease-in-out bg-blue-300" x-on:click="currentTab = 'fourth'" :class="{ 'font-bold bg-opacity-5' : currentTab === 'fourth' }">Literatura</button>
            <button class="h-12 w-full hover:bg-gray-900 hover:bg-opacity-5 transition ease-in-out bg-blue-300" x-on:click="currentTab = 'fifth'" :class="{ 'font-bold bg-opacity-5' : currentTab === 'fifth' }">Eventos</button>
        </div>
        
        <div>
            <div x-show="currentTab === 'first'" class="p-4">
                <h5 class="font-bold mb-4">
                    <a class="flex font-semibold text-blue-500 text-lg transition ease-in-out hover:underline hover:text-black" href="/boletin/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h5>
                    <p class="mb-3">
                        {{ $post->body }}
                    </p>
            </div>

            <div x-show="currentTab === 'second'" class="p-4">

                <h5 class="font-bold mb-4">
                    <a href="/boletin/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h5>
        
                <p class="mb-3">
                    {{ $post->body }}
                </p>
            </div>
                
            <div x-show="currentTab === 'third'" class="p-4">
                <h5 class="font-bold mb-4">
                    <a href="/boletin/">
                        
                    </a>
                </h5>
        
                <p class="mb-3">
                
                </p>
            </div>
                
            <div x-show="currentTab === 'fourth'" class="p-4">
                <h5 class="font-bold mb-4">
                    <a href="/boletin/">
                        
                    </a>
                </h5>
        
                <p class="mb-3">
                    
                </p>
            </div>

            <div x-show="currentTab === 'fifth'" class="p-4">
                <h5 class="font-bold mb-4">
                    <a href="/boletin/">
                        
                    </a>
                </h5>
                <p class="mb-3">
                </p>
            </div>

        </div>

    </div>
</div>
@endforeach