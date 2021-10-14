@extends('layouts.app')


@section('content')

<h1> Create post</h1>
<form method="post" action="/posts">
 @csrf
{{-- {{ csrf_field() }} --}}
<input type = "text" name = "title" placeholder="Enter title" ><br><br>

<input type = "text" name = "content" placeholder="Enter content" ><br><br>
<input type="number" name = "user_id" placeholder="user_id"><br><br>
{{-- {{csrf_token()}} --}}

<input type="submit" name="submit">

</form>


@endsection
