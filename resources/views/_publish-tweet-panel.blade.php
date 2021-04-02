<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <textarea 
            name="body"
            class="w-full rounded-md resize-none"
            rows="3"
            placeholder="Hola, {{auth()->user()->name}}"
            required
            autofocus
        ></textarea>

        <div id="imgs" class="flex flex-row"></div>

        <div class="flex items-center justify-end">
            <label 
                for="images">
                <svg 
                    class="w-6 h-6 cursor-pointer"
                    viewBox="0 0 20 20" 
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                        <g id="icon-shape">
                            <path d="M11,13 L8,10 L2,16 L11,16 L18,16 L13,11 L11,13 Z M0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 Z M15,9 C16.1045695,9 17,8.1045695 17,7 C17,5.8954305 16.1045695,5 15,5 C13.8954305,5 13,5.8954305 13,7 C13,8.1045695 13.8954305,9 15,9 Z" id="Combined-Shape"></path>
                        </g>
                    </g>
                </svg>
            <input
                class="hidden"
                type="file"
                name="images[]"
                id="images"
                multiple
            >
            </label>
        </div>
        
        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img 
                src="{{ auth()->user()->avatar }}" 
                alt="Your avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
            <button 
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm py-2 px-2 text-white w-32 h-10"
                >
                    Publicar
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2"> {{ $message }} </p>
    @enderror
</div>

<script>
    $("#images").on('change',function() {
       var fileList = this.files; 
           for(var i = 0; i < fileList.length; i++)
       {
           var t = window.URL || window.webkitURL;
           var objectUrl = t.createObjectURL(fileList[i]);
           $('#imgs').append(`
               <div> 
                   <img class="h-48 border-2" src="` + objectUrl + `" /> 
               </div>`
           );

           j = i+1;
           if(j % 3 == 0)
           {
               $('#imgs').append('<br>');
           }
       }
   });
</script>