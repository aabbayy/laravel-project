<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Support\Facades\Route;

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

# use 'php artisan route:list' in the terminal is VS or bash to get a list of routes.

// Route::get('/', function () {
//     return view('home.index'); # this return is routing through to folder view and the files 'welcome'
// })->name('home.index'); # this names the route

// Route::get('/contact', function (){
//     return view('home.contact'); #without the view cmd, a simple string of text will return
// })->name('home.contact');

#simplify the above when returning a static html page with:

    Route::view('/', 'home.index')
    ->name('home.index');

Route::view('/contact', 'home.contact')
    ->name('home.contact');

    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' => true,
            'has_comments' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => false,
            'has_comments' => true
        ],
        3 => [
            'title' => 'Intro to Golang',
            'content' => 'This is a short intro to Golang',
            'is_new' => true
        ]
    ];

    Route::get('/posts', function () use ($posts){
        // dd(request()->all()); #dd is 'dump & die'
        // dd((int)request()->input('page', '1')); 
        return view('posts.index', ['posts' => $posts]);
    });

Route::get('/posts/{id}', function ($id) use ($posts) {   #using the '{id}' tag, the digits in the URL can change and the return will change aswell

        abort_if(!isset($posts[$id]), 404);
    
    return view('posts.show', ['post' => $posts[$id]]);
})
// ->where([ #using the where function sets parameters of what 'id' can be
//     'id' => '[0-9]+' 
// ]) -- commented this out as this id parameter was added into to routeserviceprovider file.
->name('posts.show');

Route:: get('/recent-posts/{days_ago?}', function ($daysAgo = 20){ #the '?' means the numbers for days ago are optional.
 return 'Posts from ' . $daysAgo . ' days ago'; # the '.' are functionally concats
})->name('posts.recent.index')->middleware('auth'); #using middleware('auth') requires user to be authenticated to visit the route.

//route grouping
route::prefix('/fun')->name('fun.')->group(function() use($posts){

// section about redirecting routes 
Route::get('/responses', function() use($posts) {
    return response($posts, 201)->header('Content-Type', 'application/json')->cookie('MY_COOKIES', 'Abby Durbridge', 3600);
})->name('responses');

Route::get('/redirect', function(){
    return redirect('/contact');
})->name('redirect');

Route::get('/back', function(){
    return back();
})->name('back');

Route::get('/named-route', function(){
    return redirect()->route('posts.show', ['id' => 1]);
})->name('named-route');

Route::get('/away', function(){
    return redirect('http://google.com');
})->name('away');

//returning json data

Route::get('/json', function() use($posts){
    return response()->json($posts);
})->name('json');

//downloading files in public
Route::get('/download', function() use($posts){
    return response()->download(public_path('/itssully.png')) ;
})->name('download');

});