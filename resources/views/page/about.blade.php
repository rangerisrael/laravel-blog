@extends('layout.app')
              
  @section('content')

  <h1>MY About PAGE</h1>
 
  @while($test<10)


      <table> 
        <td>{{$test++}}</td>
      </table>


  @endwhile()
 
  @endsection