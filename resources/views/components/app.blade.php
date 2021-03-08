<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                @if ( auth()->check() )
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                @endif
                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                    {{ $slot }}
                </div>
    
                @if ( auth()->check() )
                    <div class="mb-6 md:mb-0 lg:w-1/6 h-full bg-blue-100 rounded-lg p-4 bg-gray-200 rounded-lg py-4 px-6 border border-gray-300">
                        @include('_friends-list') 
                    </div>
                @endif
            </div>
        </main>
    </section>
</x-master>