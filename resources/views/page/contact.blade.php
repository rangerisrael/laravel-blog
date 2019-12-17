@extends('layout.app')
              
  @section('content')


<h1 class="text-center">{{$title}}</h1>
 
@if(count($position)>0)
	 
	  

    @foreach ($position as $data)
              <div class="col-md-4 offset-5">
             
              
               <h1>{{$number++}}</h1>
                <ul>
               		



                  <li>{{$data}}</li>
                </ul>
            </div>
                
    
      
    @endforeach



<p class="text-center">Developer is <b>{{$name}}</b></p>

@endif


  @endsection