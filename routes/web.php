<?php

use App\Models\Faro;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Category;
use App\Http\Livewire\FaroPostsTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TweetLikesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/boletin/{id}', [FaroController::class, 'show']);

Route::middleware(['auth', 'can:review_posts'])->group(function () {
    Route::resource('/faro', FaroController::class)->except('show');
    Route::get('/faro', FaroPostsTable::class); //livewire
    Route::resource('categories', CategoriesController::class)->except('show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetsController::class, 'store']);

    Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikesController::class, 'destroy']);

    Route::post(
            '/profiles/{user:username}/follow', 
            [FollowsController::class, 'store']
    )->name('follow');

    Route::get(
            '/profiles/{user:username}/edit', 
            [ProfilesController::class, 'edit']
    )->middleware('can:edit,user');

    Route::patch(
            '/profiles/{user:username}', 
            [ProfilesController::class, 'update']
    )->middleware('can:edit,user');

    Route::get('/explore', [ExploreController::class, 'index']);
});

Route::get('/profiles/{user:username}', 
    [ProfilesController::class, 'show'])
->name('profile');

Route::get('/home', function () {
    return view('tweets.index', [
        'tweets' => auth()
            ->user()
            ->timeline()
    ]);
})->middleware(['auth'])->name('home');

Route::get('/explore', function() {
    return view('explore', [
        'posts' => App\Models\Faro::all(),
        'users' => User::paginate(50),
    ]);
});

require __DIR__.'/auth.php';