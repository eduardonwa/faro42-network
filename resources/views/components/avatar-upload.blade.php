<div class="flex flex-col md:grid md:grid-cols-3 md:gap-4 mb-6">
    <div class="relative flex flex-col items-center mt-8 mb-4 md:mt-0 md:mb-0">
        <img    
                src="{{ $user->avatar }}" 
                alt="Your current avatar"
                id="previewAvatar"
                class="w-auto h-44 relative bg-gray-100 rounded-full"
        >
        <label for="avatar" class="cursor-pointer rounded-full w-36 h-44 flex flex-col absolute items-center md:bg-opacity-50">
            <svg class="w-6 h-full pt-36" viewBox="0 0 20 20">
                <g id="Page-1" stroke="none" stroke-width="1" fill="white" fill-rule="evenodd">
                    <g>
                        <path d="M11,13 L8,10 L2,16 L11,16 L18,16 L13,11 L11,13 Z M0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 Z M15,9 C16.1045695,9 17,8.1045695 17,7 C17,5.8954305 16.1045695,5 15,5 C13.8954305,5 13,5.8954305 13,7 C13,8.1045695 13.8954305,9 15,9 Z" id="Combined-Shape"></path>
                    </g>
                </g>
            </svg>  
            <input  
                    class="hidden"
                    type="file"
                    name="avatar"
                    id="avatar"
            >             
        </label>
        @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>
    
    <x-name-username :user="$user"> </x-name-username>

</div>