 @extends('main')
 
 @section('title', '| Edit blog post')
 @section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
 @endsection
 
 @section('content')
<div class="row">
 <div class="col-md-8">
   {!!Form::model($post, ['route'=>['post.update', $post->id ], 'method'=>'PUT', 'files'=>true])!!}

     {{Form::label('title','Title:')}}
     {{ Form::text('title', null,   ['class' =>'form-control input-lg' ]) }}

     {{Form::label('category_id', 'Category:', ['class'=>'form-spacing-top'])}}
     {{ Form::select('category_id',$categories, null, ['class' => 'form-control']) }}

     {{Form::label('tags','Tags:', ['class'=>'form-spacing-top'])}}
     {{ Form::select('tags[]',$tags, null, ['class' => ' form-control  select2-multi','multile'=>'multiple' ]) }} 

     {{Form::label('slug','Slug:', ['class'=>'form-spacing-top'])}}
     {{Form::text('slug', null,   ['class' =>'form-control ' ]) }}

     {{Form::label('featured_image','Update Featured Image')}}
     {{Form::file('featured_image')}}
     
    {{Form::label('body','Body:',['class'=>'form-spacing-top '])}} 
    {{ Form::textarea('body', null, ['class'=>'form-control']) }}
  

   
 </div>
 <div class="col-md-4">
  <div class="well">
    <dl class="dl-horizontal"><!--defination list-->
         <dt>Created at:</dt> <!--definition title-->
         <dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd> <!--definition descrtiption-->
        </dl>
         <dl class="dl-horizontal"><!--defination list-->
         <dt>Last Updated:</dt> <!--definition title-->
         <dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd> <!--definition descrtiption-->
        </dl>
        <hr>
         <div class="row">
          <div class ="col-md-6">
           
           {!! Html::linkRoute('post.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!} 
          </div>
          <div class ="col-md-6">
           {{ Form::submit('Save Changes' ,[ 'class'=>'btn btn-success btn-block']) }}
          </div>

           
         </div>   
  </div>
 </div>
  {!! Form::close()  !!}          
</div>
 @endsection
  @section('scripts')

  {!! Html::script('js/select2.min.js') !!}

  <script type="">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
  </script>

 @endsection