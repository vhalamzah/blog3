@extends('main')
<?php $titleTag= htmlspecialchars($post->title); ?>
@section('title', "|$post->title")
 @section('content')
   <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <img src="{{asset('images/'.$post->image)}}" style="height:300px;" 
     style="width:90px;" />
      <h1> {{$post->title}} </h1>
      <p> {{$post->body}} </p>
      <hr>
    	 <p>Posted in : {{ $post->category->name}}</p> 
    	 <hr>  
    </div>  	
   </div>
     <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>
        {{$post->comments()->count() }} Comments
      </h3>
    	@foreach( $post->comments as $comment)
    	  <div class="author-info">
   <img  class="author-image" src=" {{ "https:/www.gravatar.com/gravatar" . md5(strtolower(trim($comment->email))) . "?s=50&d==mm"}} "  >
             <div class="author-name">
              <h4>{{$comment->name}}</h4>
              <p class="author-time">{{date('F nS, Y -g:iA',strtotime($comment->created_at))}}</p>
             	
             </div>
             <div class="comment-content">
               {{$comment->comment}} 	
             </div>	
    	  </div>
    	@endforeach
    </div>
    	
    </div>


    <div class="row">
     <div class="col-md-8 col-md-offset-2" id="comment-form" style="margin-top:50px;">
     {{Form::open(['route'=>['comments.store', $post->id],'method'=>'POST'])}}
       <div class="row">
         <div class="col-md-6">
           {{Form::label('name','Name:')}}
           {{Form::text('name',null, ['class'=>'form-control'])}}         	
         </div>
         <div class="col-md-6">
           {{Form::label('email','Email:')}}
           {{Form::text('email',null, ['class'=>'form-control'])}}
         </div>
         <div class="col-md-12">
            {{Form::label('comment','Comment:')}}
             {{Form::textarea('comment',null, ['class'=>'form-control', 'rows'=> '5'])}}

             {{ Form::submit('Add Comment',['class'=>'btn btn-success btn-block', 'style'=>'margin-top:15px'])}}
         	
         </div>
       	
       </div>

      {{Form::close()}}
     	
     </div>
    	
    </div>

 @endsection