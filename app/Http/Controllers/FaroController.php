<?php

namespace App\Http\Controllers;

use App\Models\Faro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;

class FaroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Faro $post)
    {
        $posts = Faro::get();
        return view('faro.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Faro $post)
    {
        $post = new Faro();
        return view('faro.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {   
        $post = request()->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'category_id' => ['required']
        ]);

        $postObject = Faro::create($post);
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $postObject->images()->create(['name' => $image->store('faro_posts_img')]);
            }
        }
        return redirect('/faro');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faro $id)
    {   
        return view('faro.show', [
            'post' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Faro::find($id);
        return view('faro.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function update(Request $request, $id)
    {
        $post = Faro::findOrFail($id);

        $post->title = $request->title;
        $post->body = $request->body;

        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image_url' => ['image']
        ]);

        $oldImage = 'storage/' . $post->image_url;
        
        if(request('image')) {
            if (file_exists($oldImage)) {
                File::delete($oldImage);
            }
            
            $post['image_url'] = request('image')->store('faro_posts_img');
        }

        $post->update();
        
        return redirect('/faro');
    }

    public function destroy(Faro $post, $id)
    {   
        $post = Faro::find($id);

        $oldImage = 'storage/' . $post->image_url;

        if (file_exists($oldImage)) {
            File::delete($oldImage);
        }

        $post->delete();

        return redirect('/faro');
    }
}
