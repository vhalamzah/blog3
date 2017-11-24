@extends('main')
@section('title','| contact')
 @section('content')
 
  <div class="row">
    <div class="col-md-12">
     <h1>contact me</h1>
    <hr>
    <form>
        <div class="form-group" action = "{{url('contact')}}" method="POST" >
              {{csrf_field()}}
            <label name="email">Email:</label>
            <input name="email" id="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label name="email">subject:</label>
            <input name="subject" id="subject" class="form-control"/>
        </div>
        <div class="form-group">
            <label name="email">Email:</label>
            <textarea id="message" name="message" class="form-control"> type in  your message here</textarea>  
        </div>
        
         <input type="submit" value="send message" class="btn btn-success"/>
    </form>
    
    </div>
    
  </div>
  @endsection
  