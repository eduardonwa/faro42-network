<x-app>
    <!-- 
    - Show a datalist of posts
    - Action buttons for each row, delete and update
    - A post should have the option to upload 1 or more images -->
    
    <a href="/faro/create" class="p-3 h-20 w-30 bg-green-600 rounded-md text-sm text-white transition ease-in-out hover:bg-green-900">Create</a>

    <div>
        @foreach ($posts as $post)
            <p>{{ $post->title }}</p>        
            <p>{{ $post->body }}</p> 
            <img src="{{ asset('faro_post_img/'.$post['image_url']) }}" alt="Post image">
            <a href="/faro/{{$post->id}}/edit" class="p-3 h-20 w-30 bg-blue-600 rounded-md text-sm text-white transition ease-in-out hover:bg-blue-900">Edit</a>
        @endforeach
    </div>

</x-app>