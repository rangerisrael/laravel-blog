@extends('layouts.app')


@section('content')
@include('inc.messege')
                

    <h1 class="text-center">POST</h1>
            @if(count($posts)>0)

            
                @while($id>1)



                @endwhile
                @foreach ($posts as $post)
<div class="container ">
        <div class="row">
                    <div class="col-md-4 col-sm-4">

                        <img style="width:100%; height:50%" src="/storage/post_images/{{$post->post_image}}">
                   </div>
                   <div class="col-md-8 col-sm-8">
         <div class="alert alert-success">

                                <h4>{{$id++}}.<a class="" href="/post/{{$post->id}}">{{ucwords($post->title)}}</a></h4>


           <small><b> Publish on</b>  {{$post->created_at}} Written by {{$post->user->name}}</small>
</div>
                   </div>
        </div>
 </div>


                @endforeach
                        {{$posts->links()}}
            @else
                    <h1> No title found</h1>


            @endif
            
@endsection