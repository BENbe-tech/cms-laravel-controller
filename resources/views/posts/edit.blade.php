@extends('layouts.app')



@section('content')
<h1>Edit Post</h1>

{!! Form::model($post,['method'=>'patch','action'=>['App\Http\Controllers\PostsController@update',$post->id]]) !!}
    {{csrf_field()}}
    {{-- <input type="hidden" name = "_method" value="PUT"> --}}

    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}<br><br>

   {{-- <input type="submit" name="submit"> --}}
   {!! Form::submit('Update Post', ['class'=>"btn btn-info"]) !!}

   {!! Form::close() !!}


   {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\PostsController@destroy',$post->id]])!!}


{{-- <input type = "hidden" name="_method" value = "DELETE"> --}}
{!! Form::submit('Delete Post', ['class'=>"btn btn-danger"]) !!}

{!! Form::close() !!}
@endsection
