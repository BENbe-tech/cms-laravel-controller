@extends('layouts.app')


@section('content')

<h1> Create post</h1>
{{-- <form method="post" action="/posts"> --}}
 {{-- @csrf --}}
{{-- {{ csrf_field() }} --}}


{!! Form::open(['method'=>'post','action'=>'App\Http\Controllers\PostsController@store']) !!}

<div class="form-group">

{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}<br><br>

{!! Form::label('content', 'Content:') !!}
{!! Form::text('content', null, ['class'=>'form-control']) !!}<br><br>

{!! Form::label('user_id', 'User_id:') !!}
{!! Form::number('user_id', null, ['class'=>'form-control']) !!}<br><br>

</div>

<div class="form-group">
{!! Form::submit('create Post', ['class'=>'btn btn-primary']) !!}
</div>

{{-- <input type = "text" name = "title" placeholder="Enter title" ><br><br>

<input type = "text" name = "content" placeholder="Enter content" ><br><br>
<input type="number" name = "user_id" placeholder="user_id"><br><br> --}}
{{-- {{csrf_token()}} --}}

{{-- <input type="submit" name="submit"> --}}

{!! Form::close() !!}

@if (count($errors)>0)

 <div class = "alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error )
       <li>{{$error}} </li>

        @endforeach


    </ul>
</div>


@endif


@endsection
