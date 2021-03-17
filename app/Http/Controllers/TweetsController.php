<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()
                ->user()
                ->timeline(),
        ]);
    }
    
    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255',
        ]);

        $tweetObject = Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
        ]);

        if(request()->hasFile('images')) {
            foreach(request()->file('images') as $image) {
                $tweetObject->images()->create(['name' => $image->store('tweet_img')]);
            }
        }

        //dd($tweetObject);

        return redirect()->route('home');
    }
}
