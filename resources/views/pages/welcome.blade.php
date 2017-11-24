@extends('main')
@section('title','|  home')

@section('content')
  <!-- Header-->
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>welcome to TSBMarkets blog</h1>
        <p class="lead"> thank you for visit this prototype blog for our wesite.. please see our popular post</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Posts</a></p>
      </div>
    </div>
  </div>
  <!-- end of Header .row -->
  <!-- content of the blog-->
  <div class="row">
    <div class="col-md-8">
       @foreach($posts as $post)
         <div class="post">
         <h3>{{$post->title}}</h3>
          <!-- <p >{{$post->body}}</p>-->
        <p >{{substr(strip_tags($post->body),0,200)}}{{strlen(strip_tags($post->body))>300 ? "..." : " "}}</p>
        <a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary"> Read More</a>
      </div>
      <hr> 
       @endforeach
      
    </div>
  
    
    
    <div class="col-md-3 col-md-offset-1">
      <h2>Side Bar</h2>
    </div>
  </div>
  <!-- end of .row-->
  
  @endsection
  @section('scripts')
<script>
//you can put specific scrits you want here or a java script code it is convenient with laravel.
</script>
@endsection

  

   

