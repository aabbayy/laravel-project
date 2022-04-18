<?php

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

Route::get('/posts/{id}', function ($id){   #using the '{id}' tag, the digits in the URL can change and the return will change aswell
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
            'is_new' => false
        ]
        ];

        abort_if(!isset($posts[$id]), 404);
    
    return view('posts.show', ['post' => $posts[$id]]);
})
// ->where([ #using the where function sets parameters of what 'id' can be
//     'id' => '[0-9]+' 
// ]) -- commented this out as this id parameter was added into to routeserviceprovider file.
->name('posts.show');

Route:: get('/recent-posts/{days_ago?}', function ($daysAgo = 20){ #the '?' means the numbers for days ago are optional.
 return 'Posts from ' . $daysAgo . ' days ago'; # the '.' are functionally concats
})->name('posts.recent.index');
