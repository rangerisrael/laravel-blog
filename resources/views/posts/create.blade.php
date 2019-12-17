@extends('layout.app')


@section('content')

    <h1> CREATE POST</h1>
                    @include('inc.messege')

    {!! Form::open(['action'=> 'PostController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data'] )!!}
            <div class="form-group">
                    <b>{{Form::label('title', 'TITLE')}}</b>
                    {{Form::text('title','',['class' => 'form-control',  'placeholder' => 'Your title goes here'])}}
                 <br>
                   <b> {{Form::label('body', 'Body')}}</b>
                      {{Form::textarea('body','',['id'=> 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Input here'])}}
                <br>
                 {{Form::file('post_image')}}
                 <br>
                 <br>   {{Form::submit('SAVE',['class' => 'btn btn-success '])}}
            </div>
       

    {!! Form::close() !!}
@endsection