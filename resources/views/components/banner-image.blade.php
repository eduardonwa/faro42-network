<div class="mt-8 mb-6 flex flex-col items-center relative">
                <label  class="mb-4 text-start w-full block uppercase font-bold text-xs text-gray-700" 
                        for="avatar"
                > Portada
                </label>
                <img    
                        src="{{ $user->banner }}" 
                        alt="Tu portada actual"
                        class="w-full h-44 mb-2 border border-gray-300 rounded-sm"
                >
                <div class="w-full">
                    <label class="bg-blue-600 hover:bg-blue-500 text-xs flex items-center justify-center rounded-lg text-gray-200 cursor-pointer">
                        <svg class="w-6 h-8 mr-8" viewBox="0 0 20 20">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="white" fill-rule="evenodd">
                                <g id="icon-shape">
                                    <path d="M11,13 L8,10 L2,16 L11,16 L18,16 L13,11 L11,13 Z M0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 Z M15,9 C16.1045695,9 17,8.1045695 17,7 C17,5.8954305 16.1045695,5 15,5 C13.8954305,5 13,5.8954305 13,7 C13,8.1045695 13.8954305,9 15,9 Z" id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg> 
                        <input  
                                class="hidden"
                                type="file"
                                name="banner"
                                id="banner"
                                width="40"
                        >
                        Cambiar imagen de portada
                    </label>
                </div>
            </div>