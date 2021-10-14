@extends('layouts.app')



@section('content')


    <h1>{{$post->user_id}}</h1>
    <h1><a href = "{{route('posts.edit',$post->id)}}"><{{$post->title}}</a></h1>
    <h1>{{$post->content}}</h1>


@endsection
