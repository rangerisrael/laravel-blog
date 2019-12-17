@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <h4><a href="/post/create" class="btn btn-primary">CREATE</a>
   
{{-- <a href="/post" class="btn btn-success col-md-2 offset-8">View All Post</a> --}}
    </h4>
        
                    @include('inc.messege')
                                <h3>YOUR POST</h3>

                                @if(count($posts)>0)
                        <table class="table table-striped">
                       <tr>
                       <th>Post Image</th>
                        <th>TITLE</th>
                        <th>ACTION</th>
                          <th>ACTION</th>
                          
                       </tr>
                            @foreach ($posts as $post)
                                    <tr>
                                    <td>
                        <img style="width:20%;" src="/storage/post_images/{{$post->post_image}}">
</td>
                                            <td>{{$post->title}}</td>
                                            <td> <a href="/post/{{$post->id}}/edit" class="btn btn-default">UPDATE</a>  </td>                                      
<td>

{!!Form::open(['action' =>['PostController@destroy',$post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}

                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('DELETE',['class' => 'btn btn-default'])}}


            {!!Form::close() !!}
                                            </td>
                                    </tr>
                            @endforeach
                        </table>
                         @else
                        <table class="table table-striped">
                                <th class="text-center">NO POST FOUND</th>
                        </table>
                    @endif

                   


                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
