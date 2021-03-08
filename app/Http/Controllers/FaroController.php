<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faro;

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
    public function create()
    {   
        return view('faro.create');
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
            'image_url' => ['file']
        ]);

        if(request('image')) {
            $post['image_url'] = request('image')->store('faro_posts_img');
        }

        $postObject = new Faro($post);
        $postObject->save();

        return redirect('/faro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $post = request()->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image_url' => ['file']
        ]);

        if(request('image')) {
            $post['image_url'] = request('image')->store('faro_posts_img');
        }

        $post->update();

        return redirect('/faro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
