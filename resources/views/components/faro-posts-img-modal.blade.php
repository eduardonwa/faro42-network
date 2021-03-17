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
    <div class="fixed inset-0 bg-gray-900 opacity-80"></div>

        <div class="bg-white my-5 rounded-md shadow-md flex items-center justify-center max-w-3xl m-auto fixed inset-0">
            <aside class="m-2">
                <svg 
                    class="w-8 cursor-pointer"
                    viewBox="0 0 20 20" 
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                        <g id="icon-shape">
                            <path d="M0,10 C0,15.5228475 4.4771525,20 10,20 C15.5228475,20 20,15.5228475 20,10 C20,4.4771525 15.5228475,1.01453063e-15 10,0 C4.4771525,-1.01453063e-15 3.55271368e-15,4.4771525 0,10 L0,10 Z M2,10 C2,14.418278 5.581722,18 10,18 C14.418278,18 18,14.418278 18,10 C18,5.581722 14.418278,2 10,2 C5.581722,2 2,5.581722 2,10 L2,10 Z M10,8 L10,12 L15,12 L15,8 L10,8 L10,8 Z M5,10 L10,15 L10,5 L5,10 L5,10 Z" id="Combined-Shape"></path>
                        </g>
                    </g>
                </svg>
            </aside>

            <main>
                <a href="#" class="absolute right-16 top-10 h-8 w-8 text-xl text-center flex items-center justify-center border-2 cursor-pointer hover:bg-gray-200 transition ease-in-out">
                    &times;
                </a>
                <img
                    src="faro_posts_img/{{$slot}}"
                    alt=""
                    class="p-4"
                >
            </main>

            <aside class="m-2">
                <svg 
                    class="w-8 hover:text-white cursor-pointer"
                    viewBox="0 0 20 20" 
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                        <g id="icon-shape">
                            <path d="M20,10 C20,4.4771525 15.5228475,0 10,0 C4.4771525,0 9.50500275e-16,4.4771525 6.123234e-16,10 C2.74146524e-16,15.5228475 4.4771525,20 10,20 C15.5228475,20 20,15.5228475 20,10 L20,10 Z M18,10 C18,5.581722 14.418278,2 10,2 C5.581722,2 2,5.581722 2,10 C2,14.418278 5.581722,18 10,18 C14.418278,18 18,14.418278 18,10 L18,10 Z M10,12 L10,8 L5,8 L5,12 L10,12 L10,12 Z M15,10 L10,5 L10,15 L15,10 L15,10 Z" id="Combined-Shape"></path>
                        </g>
                    </g>
                </svg>
            </aside>
        </div>
</div>