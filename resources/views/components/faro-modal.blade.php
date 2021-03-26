@props([
    'hash',
    'type' => 'images',
    'height' => [
        'images' => 'h-64',
        'categories' => 'h-3/5'
    ]
])

<div 
    x-data="{show: false, hash: '{{ $hash }}'}" 
    x-show="show"
    x-on:modal.window="
        show = ($event.detail === hash);
    "
    @keydown.escape.window="show = false"
    @hashchange.window="
        show = (location.hash === '#{{$hash}}');
    "
>
    <div class="fixed inset-0 bg-gray-900 opacity-80 p-20"></div>
        <div {{ $attributes->merge([ 
            'class' =>
                "{$height[$type]} fixed inset-0 flex items-center justify-center w-72 m-auto md:h-auto md:w-auto md:max-w-3xl md:my-5 md:mx-5 md:mx-auto bg-white rounded-md shadow-md overflow-x-auto md:overflow-hidden"
            ]) }}
        >
            <a href="#" 
                class="absolute z-10 right-0 top-0 md:right-16 md:top-10 h-8 w-8 text-xl text-center flex items-center justify-center cursor-pointer hover:bg-gray-200 transition ease-in-out">
                &times;
            </a>
            
            {{$slot}}
            
        </div>
</div>