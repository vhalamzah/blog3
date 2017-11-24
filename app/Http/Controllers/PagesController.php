<?php 
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;


 class PagesController extends Controller{
    
    public function getIndex(){
         $posts=Post::orderBy('created_at', 'desc')->limit(4)->get();
         return view('pages.welcome')->withPosts($posts);
    }
    
    public function getAbout(){
        # passing data to  view lesson on
        # a cleaner way to pass data into a view
        # passing large amounts of variables in to a view in form of an array.
        
    /*$first = "mulamuleli";
    $last = "rabulanayana";
    $fullname = $first." ".$last;
    $email='kukzeea@gmail.com';
    
    $data =[];
    $data['email']= $email;
    $data['fullname'] =$fullname;*/
          return view('pages.about');
     }
     
    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(){
        $this->validate($Request,[
            'emai;'=>'required|email',
            'subject'=>'min:10',
            'message'=>'min:30'

            ]);
        $data = array(
            'email'=>$request ->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
            );
        Mail::send('emails.contact', $data, function($message) use ($data){

            $message->from($data['email']);
            $message->to('noreply@vhalamzah.com');
            $message->subject($data['subject']);

        });
          Session::flash('success', 'your email has been sent');
          // return redirect()->url('/');
    }


    
}