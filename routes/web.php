<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;
use App\Models\Taggable;


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


// /*
// |--------------------------------------------------------------------------
// | Eloquent
// |--------------------------------------------------------------------------
// |
// */

// Route::get('/all', function() {
//     $posts = Post::all();

//     foreach($posts as $post) {
//         return $post->post_title;
//     }
// });

// Route::get('/find', function() {
//     $post = Post::find(1);

//     return $post->post_title;
// });

// Route::get('/findwhere', function() {
//     $posts = Post::where('id', 1)
//     ->orderBy('id', 'desc')
//     ->take(1)
//     ->get();

//     return $posts;
// });

// Route::get('/findOrFail', function() {
//     $posts = Post::findOrFail(2);
//     // $posts = Post::findOrFail(10);

//     return $posts->post_title;

// });

// Route::get('/findmore', function() {
//     $posts = Post::where('id', '<', 50)->firstOrFail();

//     return $posts;

// });

// Route::get('/basicinsert', function() {
//     $post = new Post;

//     $post->post_title = 'New post tilte 3';
//     $post->post_body = 'new content';
//     $post->user_id = 1;

//     $post->save();

// });

// Route::get('/basicupdate', function() {
//     $post = Post::where('id',1);

//     $post->post_title = 'updated title';

//     $post->save();
// });

// Route::get('/update', function(){
//     Post::where('id',2)->where('is_admin', 0)->update(['post_title'=>'New tilte', 'post_body'=>'new post body']);

// });

// Route::get('/delete', function() {
//     $post = Post::where('id', 1);

//     $post->delete();
// });

// Route::get('/destroy', function() {
//     Post::destroy([2,3]);
// });

// Route::get('/softdelete', function() {
//     Post::find(1)->delete();
// });

// Route::get('/readsoftdelete', function() {
//     $post = Post::onlyTrashed()->get();
//     return $post;
// });

// Route::get('/restore', function() {
//     $post = Post::onlyTrashed()->where('id', 1)->restore();
// });

// Route::get('/forcedelete', function() {
//     $post = Post::withTrashed()->where('id', 1)->forcedelete();
// });

// Route::get('/adduser', function() {
//     $user = new User;

//     $user->name = 'Basi';
//     $user->email = 'test3@test.com';
//     $user->password = '12345';

//     $user->save();
// });

// Route::get('/user/{id}/post', function($id) {
//     return User::find($id)->post;
// });

// Route::get('/post/{id}/user', function($id){
//     return Post::find($id)->user->name;
// });

// Route::get('/posts/{id}', function($id) {
//     $user = User::find($id);
//     foreach($user->posts as $post){
//         echo $post->post_title."<br>";
//     }
// });

// Route::get('/addrole', function() {
//     $role = new Role;
//     $role->name = 'administrator';

//     $role->save();

//     $role2 = new Role;
//     $role2->name = 'subscriber';
//     $role2->save();
// });

// Route::get('/user/{id}/role', function($id) {
//     $user = User::find($id);

//     foreach($user->roles as $role){
//         echo $role->name;
//     };
// });

// Route::get('user/pivot', function() {
//     $user = User::find(1);

//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//     }
// });

// Route::get('/user/country', function(){

// });

// Route::get('/addCountry', function(){
//     $country = new Country;
//     $country->name = 'Canada';

//     $country->save();
// });

// Route::get('/updateuser', function(){
//     User::where('id',4)->update(['country_id'=>3]);
// });

// Route::get('/user/country/{id}', function($id) {
//     $country = Country::find($id);

//     foreach($country->posts as $post){
//         echo $post->post_title.'<br>';
//         echo $post->post_body.'<br>';
//         echo '<br>';
//     }
// });

// Route::get('/insertPhoto', function(){
//     $photo1 = new Photo;
//     $photo1->path = 'basi.jpg';
//     $photo1->imageable_id = 1;
//     $photo1->imageable_type = 'App\Models\User';
//     $photo1->save();

//     $photo2 = new Photo;
//     $photo2->path = 'post.jpg';
//     $photo2->imageable_id = 1;
//     $photo2->imageable_type = 'App\Models\Post';
//     $photo2->save();
// });

// Route::get('/user/{id}/photos', function($id){
//     $user = User::find($id);

//     foreach($user->photos as $photo){
//         echo $photo->path;
//     }
// });

// Route::get('post/{id}/photos', function($id){
//     $post = Post::find($id);

//     foreach($post->photos as $photo){
//         echo $photo->path;
//     }
// });

// Route::get('photo/{id}/owner', function($id){
//     $photo = Photo::findOrFail($id);
//     echo $photo->imageable;
// });

// Route::get('/insertvideo', function(){
//     $video1 = new Video;
//     $video1->name = 'basi.mov';
//     $video1->save();

//     $video2 = new Video;
//     $video2->name = 'haha.mov';
//     $video2->save();

// });

// Route::get('/inserttag', function(){
//     $tag1 = new Tag;
//     $tag1->name = 'php';
//     $tag1->save();

//     $tag2 = new Tag;
//     $tag2->name = 'JavaScript';
//     $tag2->save();

// });

// Route::get('/inserttaggable', function(){
//     $var1 = new Taggable;
//     $var1->tag_id = 1;
//     $var1->taggable_id = 1;
//     $var1->taggable_type = 'App\Models\Video';
//     $var1->save();

//     $var2 = new Taggable;
//     $var2->tag_id = 2;
//     $var2->taggable_id = 2;
//     $var2->taggable_type = 'App\Models\Post';
//     $var2->save();
// });

// Route::get('/{type}/{id}/tag',function($type, $id){
//     if ($type == 'post'){
//         $post = Post::findOrFail($id);

//         foreach ($post->tags as $tag){
//             echo $tag->name;
//         }
//     }
//     else{
//         $video = Video::findOrFail($id);

//         foreach ($video->tags as $tag){
//             echo $tag->name;
//         }
//     }
    
// });

// Route::get('/tag/{type}/{id}', function($type, $id){
//     $tag = Tag::findOrFail($id);

//     if($type == 'post'){
//         foreach($tag->posts as $post){
//             echo $post->post_title;
//         }
//     }
//     else{
//         foreach($tag->videos as $video){
//             echo $video->name;
//         }
//     }
// });

//One to One
// Route::get('/insert', function(){

//     $user = new User();
//     $user->name = 'Basi';
//     $user->user_id = 1;
//     $user->save();

//     // $user = User::findOrFail(1);
//     // $address = new Address(['address'=>'1234 Houston av NY NY 11218']);
//     // $user->address()->save($address);

// });

// Route::get('/update', function(){
//     $address = Address::where('user_id', 1)->first();
//     $address->address = "1234 Bull street, bull, bull";
//     $address->save();
// });

// Route::get('/read', function(){
//     $user = User::findOrFail(1);
//     echo $user->address->address;
// });

// Route::get('/delete', function(){
//     $user = User::findOrFail(1);
//     $user->address()->delete();
// });

//One to Many

// Route::get('/create', function(){
//     $user = User::findOrFail(1);
//     $post = new Post(['title'=> 'post title', 'body'=>'post body']);
//     $user->posts()->save($post);
// });

// Route::get('/read', function(){
//     $user = User::where('user_id', 1)->first();

//     foreach($user->posts as $post){
//         echo $post->title. '<br>';
//         echo $post->body;
//     };  
// });

// Route::get('/update', function(){
//     $user = User::where('user_id', 1)->first();
//     $user->posts()->where('id', 1)->update(['title'=> 'post title3', 'body'=>'post body2']);
// });

// Route::get('/delete', function(){
//     $user = User::where('user_id', 1)->first();
//     $user->posts()->where('id', 1)->delete();
// });

//Many to Many
// Route::get('/createrole', function(){
//     // $user = User::where('user_id', 1)->first();
//     // $role = new Role(['name'=>'admin']);
//     // $user->roles()->save($role);
//     $role = new Role(['name'=>'admin']);
//     $role->save();
// });

// Route::get('/readrole', function(){
//     $user = User::where('user_id', 1)->first();
//     foreach($user->roles as $role){
//         echo $role->name;
//     };
// });

// Route::get('/updaterole', function(){
//     $user = User::findOrFail(1);
//     if ($user->has('roles')){
//         foreach($user->roles as $role){
//             if($role->name == 'admin'){
//                 $role->name = 'administrator';
//                 $role->save();
//             }
//         }
//     }
// });

// Route::get('/deleterole', function(){
//     $user = User::findOrFail(1);

//     foreach($user->roles as $role){
//         $role->where('id', 1)->delete();
//     }
// });

// Route::get('/attach', function(){
//     $user = User::findOrFail(1);

//     $user->roles()->attach(2);
// });

// Route::get('/detach', function(){
//     $user = User::findOrFail(1);
//     $user->roles()->detach(1);
// });

// Route::get('/sync', function(){
//     $user = User::findOrFail(1);
//     $user->roles()->sync(2);
// });

//Polymorphic relations
// Route::get('/create', function(){
//     // $staff = New Staff(['name' => 'Basi']);
//     // $staff -> save();

//     // $staff = Staff::findOrFail(1);
//     // $staff->photos()->create(['path'=>'doug1.jpg']);
// });

// Route::get('/read', function(){
//     $staff = Staff::findOrFail(1);

//     foreach($staff->photos as $photo){
//         echo $photo->path;
//     }
// });

// Route::get('/update', function(){
//     $staff = Staff::findOrFail(1);

//     $photo = $staff->photos()->where('id', 1)->first();
//     $photo->path = 'doug2.jpg';
//     $photo->save();
// });

// Route::get('/delete', function(){
//     $staff = Staff::findOrFail(1);

//     $staff->photos()->delete();
// });

// Route::get('assign', function(){
//     $staff = Staff::findOrFail(1);


// });

//Polymorphic Many to many
Route::get('/insert', function(){
    $tags = ['PHP', 'Java', 'JS', 'Python', 'C#'];
    
    foreach($tags as $tag){
        $newTag = New Tag;
        $newTag->name = $tag;
        $newTag->save();
    }

});

Route::get('/create', function(){
    $post = Post::create(['name'=>'post 1']);
    $tag = Tag::findOrFail(1);
    $post->tags()->save($tag);
    // $post->save();

    $video = Video::create(['name'=>'video 1']);
    $tag = Tag::findOrFail(2);
    $video->tags()->save($tag);
    // $video->save();
});

Route::get('/read', function(){
    $post = Post::findOrFail(14);

    foreach($post->tags as $tag){
        echo $tag;
    }

});

Route::get('/update', function(){
    $post = Post::findOrFail(14);
    foreach($post->tags as $tag){
        $tag->where('Name', 'PHP')->update(['name'=>'PHP2']);
    }
});

Route::get('/delete', function(){
    $post = Post::findOrFail(14);
    foreach($post->tags as $tag){
        $tag->where('id', 1)->delete();
    }
});