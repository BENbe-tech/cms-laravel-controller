<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //  $posts = Post::all();
        // $posts = Post::orderBy('id','asc')->get();
        $posts = Post::latest();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return "ben";
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        // return $request->all();
        // return $request->get('title');
        // return $request->title;
    //    Post::create($request->all());

    //    return redirect('/posts');

    //   $input = $request->all();
    // $input['title'] = $request->title;

    // $this->validate($request,[
    // 'title' => 'required',
    // 'content' => 'required',
    // 'user_id'=>'required'


    // ]);

     $post = new Post;
      $post->title = $request->title;
      $post->user_id = $request->user_id;
      $post->content = $request->content;
      $post->save();
      return redirect('/posts');

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
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
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
        //
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post = Post::whereId($id)->delete();
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }

    public function contact(){

        $people = ['Edwin','Jose','James','Peter','Maria'];
     return view('contact',compact('people'));

    }

    public function show_post($id){

        // return view('post')->with('id',$id);
        return view('post',compact('id'));
    }

}

