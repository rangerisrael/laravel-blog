@extends('layouts.app')


@section('content')
<div class="container">
<a class="btn btn-success" href="/post">GO BACK</a>
  
    <h1>{{$posts->title}}</h1>
                          <img style="width:100%; height:50vh;;" src="/storage/post_images/{{$posts->post_image}}">

    <pre>
{!!$posts->body!!}
    </pre>

    <small>Posted on {{$posts->created_at}} Written by: {{$posts->user->name}}</small>
           <hr>
@if(!Auth::guest())

@if(Auth::user()->id ==$posts->user_id)
           <a href="/post/{{$posts->id}}/edit" class="btn btn-primary">UPDATE</a>

           {!!Form::open(['action' =>['PostController@destroy',$posts->id], 'method' => 'POST', 'class' => 'pull-right'])!!}

                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('DELETE',['class' => ' btn btn-danger'])}}


            {!!Form::close() !!}
            </div>
@endif
@endif
@endsection