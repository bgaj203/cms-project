<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return view('vendors/welcome');
});

// Route::get('/test', function () {
//     return 'test';
// });

// Route::get('/about', function () {
//     return 'about';
// });

// Route::get('/contact', function () {
//     return 'contact';
// });

// Route::get('/post/{id}/{name}', function($id, $name) {
//     return 'This is post number '. $id . " by ". $name;
// });

// Route::get('/something/{id}/{name}', function($id, $name) {
//     return $id. 'and '. $name;
// });

// // Nick name a Route
// Route::get('/admin/posts/example', array('as' => 'admin.home', function() {
//     $url = route('admin.home');

//     return $url;
// }));

// Route::get('/post/{postID}', '\App\Http\Controllers\PostController@index');

// Route::resource('posts', '\App\Http\Controllers\PostController');

// Route::get('/contact', '\App\Http\Controllers\PostController@contact');

// Route::get('/post/{id}/{name}/{age}', '\App\Http\Controllers\PostController@showPost');

Route::get('/insert', function() {
    DB::insert('insert into posts(post_title, post_body) values(?, ?)', ['PHP with Laravel', 'Laravel is the best thing']);
});

Route::get('/read', function () {
    $results = DB::select('select * from posts where post_id = ?', [2]);

    foreach ($results as $post) {
        return $post->post_title;
    }
});

Route::get('/update', function() {
    $updated = DB::update('update posts set post_title = "New PHP with Laravel" where post_id = ?', [2]);

    return $updated;
});

Route::get('/delete', function() {
    $deleted = DB::delete('delete from posts where post_id = ?', [2]);
    return $deleted;
});