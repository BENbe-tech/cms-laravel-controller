@extends('layouts.app')



@section('content')

<ul>

@foreach ($posts as $post)
<li><a href= "{{route('posts.show',$post->id)}}">{{$post->user_id}}</a></li>
<li><a href= "{{route('posts.show',$post->id)}}">{{$post->title}}</a></li>
<li><a href= "{{route('posts.show',$post->id)}}">{{$post->content}}</a></li>

@endforeach

</ul>



@endsection
