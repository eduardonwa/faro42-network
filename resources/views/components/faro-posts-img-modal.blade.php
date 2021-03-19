@props(['hash'])

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
        <div class="fixed inset-0 flex items-center justify-center w-72 h-96 m-auto md:h-auto md:w-auto md:max-w-3xl md:my-5 md:mx-5 md:mx-auto bg-white rounded-md shadow-md">
            <a href="#" 
                class="absolute right-10 top-10 md:right-16 md:top-10 h-8 w-8 text-xl text-center flex items-center justify-center cursor-pointer hover:bg-gray-200 transition ease-in-out">
                &times;
            </a>
            
            {{$slot}}
            
        </div>
</div>

