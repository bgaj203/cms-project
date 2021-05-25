<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

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

// Route::get('/insert', function() {
//     DB::insert('insert into posts(post_title, post_body) values(?, ?)', ['PHP with Laravel 5', 'Laravel is the best thing']);
// });

// Route::get('/read', function () {
//     $results = DB::select('select * from posts where post_id = ?', [2]);

//     foreach ($results as $post) {
//         return $post->post_title;
//     }
// });

// Route::get('/update', function() {
//     $updated = DB::update('update posts set post_title = "New PHP with Laravel" where post_id = ?', [2]);

//     return $updated;
// });

// Route::get('/delete', function() {
//     $deleted = DB::delete('delete from posts where post_id = ?', [2]);
//     return $deleted;
// });


/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
|
*/

Route::get('/all', function() {
    $posts = Post::all();

    foreach($posts as $post) {
        return $post->post_title;
    }
});

Route::get('/find', function() {
    $post = Post::find(1);

    return $post->post_title;
});

Route::get('/findwhere', function() {
    $posts = Post::where('id', 1)
    ->orderBy('id', 'desc')
    ->take(1)
    ->get();

    return $posts;
});

Route::get('/findOrFail', function() {
    $posts = Post::findOrFail(2);
    // $posts = Post::findOrFail(10);

    return $posts->post_title;

});

Route::get('/findmore', function() {
    $posts = Post::where('id', '<', 50)->firstOrFail();

    return $posts;

});

Route::get('/basicinsert', function() {
    $post = new Post;

    $post->post_title = 'New post tilte';
    $post->post_body = 'new content';

    $post->save();

});

Route::get('/basicupdate', function() {
    $post = Post::where('id',1);

    $post->post_title = 'updated title';

    $post->save();
});

Route::get('/update', function(){
    Post::where('id',2)->where('is_admin', 0)->update(['post_title'=>'New tilte', 'post_body'=>'new post body']);

});

Route::get('/delete', function() {
    $post = Post::where('id', 1);

    $post->delete();
});

Route::get('/destroy', function() {
    Post::destroy([2,3]);
});

Route::get('/softdelete', function() {
    Post::find(1)->delete();
});

Route::get('/readsoftdelete', function() {
    $post = Post::onlyTrashed()->get();
    return $post;
});

Route::get('/restore', function() {
    $post = Post::onlyTrashed()->where('id', 1)->restore();
});

Route::get('/forcedelete', function() {
    $post = Post::withTrashed()->where('id', 1)->forcedelete();
});