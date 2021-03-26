<div class="h-full w-full p-4">
    <div x-data="{currentTab: 'index'}" class="h-auto flex flex-col items-center justify-center mt-8">
        
        <div class="w-full text-center">
            {{$tabLinks}}
        </div>

        <div 
            x-show="currentTab === 'index'" 
            class="flex flex-col w-full"
        >
            {{$index}}
        </div>

        <div 
            x-show="currentTab === 'create'" 
            class="flex flex-col w-full"
        >
            {{$create}}
        </div>

    </div>
</div>