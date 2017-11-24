 @extends('main')

 @section('title', '|forget my password')

 @section('content')

<div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default">
  	 <div class="panel-heading">Reset Password</div>
  	 <div clas="panel-body">
         {!!Form::open(['url'=>'password/email','method'=>"POST"])!!}

           {{ Form::hidden('token',$token)}}
           {{Form::label('email', 'Email Address:')}}
           {{Form::email('email',$email, ['class'=> 'form-control'])}}

           {{Form::label('password', 'Password:')}}
           {{Form::password('password', ['class'=> 'form-control'])}}
           {{Form::label('password_confirmation', 'Confirm Password:')}}
           {{Form::password('password_confirmation', ['class'=> 'form-control'])}}

           {{Form::submit('Reset Password',['class'=>'btn-btn-primary'])}}

         {!!Form::close()!!}

  	 	
  	 </div>
  </div>
	
</div>

 @endsection