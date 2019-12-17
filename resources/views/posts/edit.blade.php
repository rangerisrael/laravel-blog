@extends('layout.app')



@section('content')


 <h1> EDIT POST</h1>
                    @include('inc.messege')

    {!! Form::open(['action'=> ['PostController@update',$posts->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'] )!!}
            <div class="form-group">
                    <b>{{Form::label('title', 'TITLE')}}</b>
                    {{Form::text('title',$posts->title,['class' => 'form-control',  'placeholder' => 'Your title goes here'])}}
                 <br><br>
                   <b> {{Form::label('body', 'Body')}}</b>
                      {{Form::textarea('body',$posts->body,['id'=> 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Input here'])}}
                         <br>
                 {{Form::file('post_image')}}
                 <br>
            </div>
       {{Form::hidden('_method','PUT')}}
                 <br>   
      {{Form::submit('EDIT',['class' => 'btn btn-success '])}}
           
    {!! Form::close() !!}



@endsection