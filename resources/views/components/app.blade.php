<x-master>
    <section class="px-8">
        <main class="mx-auto">

            <div class="lg:flex lg:justify-between">
                
                @if ( auth()->check() )
                    <div class="flex items-center justify-between lg:w-32 md:w-32 md:items-start md:relative md:p-0 md:bg-transparent bg-blue-200 w-full p-4 absolute right-0 top-0">
                        <nav>
                            <div x-data="{ isOpen: false }"> 
                                <div class="flex justify-between items-center">
                                    <!-- Mobile menu button -->
                                    <div class="flex md:hidden">
                                        <button 
                                            type="button" 
                                            class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" 
                                            aria-label="toggle menu"
                                            x-on:click="isOpen = ! isOpen"
                                        >
                                            <svg 
                                                class="h-6 w-6 fill-current"
                                                viewBox="0 0 10 20" 
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                                                    <g id="icon-shape">
                                                        <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Menu, if mobile set to hidden -->
                                <div :class="isOpen ? 'show' : 'hidden' " class="md:flex items-center md:block mt-4 md:mt-0">
                                    <div class="flex flex-col md:flex-row">
                                        @include('_sidebar-links')
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                    {{ $slot }}
                </div>
    
                @if ( auth()->check() )
                    <div class="mb-6 md:mb-6 lg:mb-0 lg:w-1/6 h-full bg-blue-100 rounded-lg p-4 bg-gray-200 rounded-lg py-4 px-6 border border-gray-300">
                        @include('_friends-list') 
                    </div>
                @endif
                
            </div>

        </main>
    </section>
</x-master>