<?php

use App\Models\Country;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
Use App\Models\Photo;
Use App\Models\Role;
Use App\Models\Tag;
Use App\Models\Video;
Use App\Models\Taggable;
Use App\Http\Controllers\PostsController;
Use Carbon\Carbon;

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

// Route::get('/about', function () {
//     return "Hi about page";

// });


// Route::get('/contact', function () {
//     return "Hi I am contact";

// });

// Route::get('/post/{id}/{name}', function($id,$name){

// return "This is post number". $id. " ". $name;

// });

// Route::get('admin/posts/example',array('as'=>'admin.home',function(){
// $url = route('admin.home');

// return "this url is" . $url;

// }));

// Route::get('/post/$id','App\Http\Controllers\PostsController@index');

// Route::resource('post'. 'App\Http\Controllers\PostsController');

// Route::get('/contact','App\Http\Controllers\PostsController@contact');

// Route::get('post/{id}','App\Http\Controllers\PostsController@show_post');


/*
|--------------------------------------------------------------------------
| Web SQL DB
|--------------------------------------------------------------------------
|
|
|
*/




// Route::get('/insert',function(){

//  DB::insert('insert into posts(title, content) values(?,?)', ['Laravel is awesome with Alpha','Laravel is the best thing that has happened to PHP,Jong']);


// });


// Route::get('/read', function(){

// $results = DB::select("select * from posts where id =?",[1]);

// return var_dump($results);

// // foreach($results as $post){

// //     return $post->title;
// // }

// });

// Route::get('/update',function(){

// $updated = DB::update('update posts set title ="update title" where id = ?', [1]);

// return $updated;

// });

// Route::get('/delete',function(){

// $deleted = DB::delete('delete from posts where id = ?', [2]);

// return $deleted;
// });


/*
|--------------------------------------------------------------------------
|ELOQUENT
|--------------------------------------------------------------------------
|
|
|
*/
// Route::get('/read', function(){

// $posts = Post::all();

// foreach($posts as $post){
//     return $post->title;
// }
// });

// Route::get('/find', function(){

//     $post = Post::find(1);


//         return $post->title;

//     });


// Route::get('/findwhere',function(){

// $posts = Post::where('id',1)->orderBy('id','desc')->take(1)->get();

// return $posts;

// });

// Route::get('/findmore',function(){

//     $posts = Post::findOrFail(1);
//     return $posts;

//     $posts = Post::where('users_count', '<' , 50)->firstOrFail();

// });


// Route::get('/basicinsert',function(){

// $post = new Post;
// $post->title = "Welcome to cybersecutiy world";
// $post->content = "Ethical hacking and penetration testing";
// $post->save();

// });

// Route::get('/basicinsert1',function(){

//     $post =  Post::find(1);
//     $post->title = "New Eloquent title insert update 1";
//     $post->content = "Wow eloquent is really cool, look at this content";
//     $post->save();

//     });

// Route::get('/create',function(){

// Post::create(['title'=>'school','content'=>'uni student']);

// });

// Route::get('/update',function(){
// Post::where('id',1)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE 12','content'=>'I love my instructor Edwin']);

// });


// Route::get('/delete',function(){

//  $post = Post::find(13);
//  $post->delete();


// });

// Route::get('/delete2',function(){

// Post::destroy([3.4]);
// Post::where('is_admin',0)->delete();

// });

// Route::get('/softdelete',function(){

//     Post::find(3)->delete();

// });

// Route::get('/readsoftdelete',function(){

//     // $post = Post::find(3);
//     // return $post;

//  $post = Post::onlyTrashed()->where('is_admin',0)->get();
//  return $post;

// });


// Route::get('/restore',function(){

// Post::withTrashed()->where('is_admin',0)->restore();

// });

// Route::get('/forcedelete',function(){
// Post::onlyTrashed()->where('is_admin',0)->forceDelete();

// });



/*
|--------------------------------------------------------------------------
|ELOQUENT Relationships
|--------------------------------------------------------------------------
|
|
|
*/

//one to one relationship
// Route::get('/user/{id}/post', function($id){

//   return User::find($id)->post->title;

// });

// Route::get('/post/{id}/user',function($id){

//     return Post::find($id)->user->name;

// });
//one to many relationship

// Route::get('/posts',function(){

//     $user = User::find(1);
//     foreach($user->posts as $post){
//         echo $post->title. "<br>";
//     }

// });

// Route::get('/user/{id}/role',function($id){

//     $user = User::find($id)->roles()->orderBy('id','desc')->get();

//     return $user;
    // foreach($user->roles as $role){
    //      return $role->name;
    // }

// });

//many to many accessing the intermediate table /pivot

// Route::get('user/pivot',function(){

//  $user = User::find(1);

//  foreach($user->roles as $role){
//      return $role->pivot;
//  }

// });

// Route::get('/user/country', function(){

//    $country =  Country::find(6);
//     foreach($country->posts as $post){
//         return $post->title;
//     }

// });


//Polymorphic relations

// Route::get('post/{$id}/photos',function($id){

//     $post = Post::find($id);

//     foreach($post->photos as $photo){

//         echo $photo->path . "<br>";

//     }

// });


// Route::get('photo/{id}/post',function($id){

// $photo = Photo::findOrFail($id);
// $imageable = $photo ->imageable_id;
//   return $imageable;

// });

//Polmorphic Mant to Many

// Route::get('/post/tag',function(){
//  $post = Post::find(1);

//  foreach($post->tags as $tag){
//      echo $tag->name;
//  }

// });


// Route::get('/tag/post',function(){

//     $tag = Tag::find(1);
//     return $tag->posts;

//     foreach($tag->posts as $post){
//         return $post ->title;
//     }
// });


/*
|--------------------------------------------------------------------------
|Crud Application
|--------------------------------------------------------------------------
|
|
|
*/


Route::group(['middleware'=>'web'], function(){


    Route::resource('/posts',PostsController::class);


});

Route::get('/dates', function(){

   $date = new DateTime('+1 week');

   echo $date->format('m-d-y');

    echo '<br>';

    echo Carbon::now()->addDays(10)->diffForHumans();

    echo '<br>';


    echo Carbon::now()->subMonths(5) -> diffForHumans();
    echo '<br>';

    echo Carbon::now()->yesterday()->diffForHumans();
    echo '<br>';

});

Route::get('/getname',function(){

$user = User::find(1);

echo $user->name;

});

Route::get('/setname',function(){

    $user = User::find(1);

    $user->name = "william";

    $user->save();

    });


