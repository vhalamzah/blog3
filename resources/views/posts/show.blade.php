 @extends('main')

@section('title','view posts')
 
@section('content')
<div class="row">
 <div class="col-md-8">
  <img src="{{asset('image/'.$post->image)}}" alt="this is a photo" />
  <h1> {{$post->title}}</h1>
  <p class="lead">{{strip_tags($post->body)}}</p>
  <hr>
   <div class="tags">
    @foreach ($post->tags as $tag)
    <span class="label label-default">{{$tag->name}}</span>
   @endforeach
  </div>
  <div id="backend-comments" style="margin-top: 50px;">
   <h3> Comments <small> {{ $post->comments()->count() }} total </small></h3>
    
    <table class="table">
     <thead>
     <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Comment</th>
       <th width="70"></th>   
     </tr> 
     </thead>
     <tbody>
       @foreach($post->comments as $comment)
        <tr>
          <td>{{$comment->name}}</td>
          <td>{{$comment->email}}</td>
          <td>{{$comment->comment}}</td>
          <td>
          <a href="{{route('comments.edit', $comment->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
          
          <a href="{{route('comments.delete', $comment->id)}}" class="btn btn-xs btn-danger" ><span class="glyphicon glyphicon-trash"></span></a>
          </td>
        </tr>

       @endforeach
     </tbody>
      
    </table>
  </div>

 </div>
 <div class="col-md-4">
  <div class="well">
       <dl class="dl-horizontal">
       
         <label>Url:</label> 
         <p> <a href="{{route('blog.single', $post->slug)}}">{{route('blog.single', $post->slug)}} </a> </p>
        </dl>

        <dl class="dl-horizontal">
           <lablel> Category:</label>
           <p class="lead">{{$post->category->name}}</p>
        </dl>
       <dl class="dl-horizontal">

         <label>Created at:</label> 
         <p>{{date('M j, Y h:ia', strtotime($post->created_at))}}</p>
        </dl>
         <dl class="dl-horizontal">
         <label>Last Updated:</label> 
         <p>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</p>
        </dl>
        <hr>
         <div class="row">
          <div class ="col-md-6">
           
          {!! Html::linkRoute('post.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-block')) !!} 
          
      
           </div>
            <div class ="col-md-6">
                {!!Form ::open(['route'=>['post.destroy', $post->id],'method'=>'DELETE'])!!}
                {!!Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
                {!!Form::close() !!}

           </div>
           <div class="row">
          <div class ="col-md-12">
           
          {!! Html::linkRoute('post.index', '<< See All Posts', array($post->id), array('class'=>'btn btn-default btn-block','style'=>'margin-top:15px;')) !!} 
          
      
           </div>
         </div>
   
  </div>
  
  
 </div>
</div>
 

 
     
    
    </div> <!-- end of .well -->
 </div> <!-- end of -- .row>-->
 @endsection
