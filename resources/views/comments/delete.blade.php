@extends('main')
@section('title','| Delete Comment')
 
 @section('content')
 <div class="row">
     <div class="col-md-8 col-md-offset-2">
         <h1>Edit Comment</h1>
        <p>
        	<strong> Name:</strong>{{$comment->name}}<br>
        	<strong> Email</strong>{{$comment->email}}<br>
        	<strong> Comment</strong>{{$comment->comment}}
        </p>
          {{Form::open(['route'=>['comments.destroy', $comment->id] , 'method'=>'GET' ] )}}

            {{Form::submit('YES DELETE THESE COMMENT', ['class'=>'btn btn-lg btn-danger'])}}

          {{Form::close()}}
     </div>
 </div>
  @endsection