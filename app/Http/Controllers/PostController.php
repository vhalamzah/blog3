<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Tag;
use Session;
use App\Category;
use Purifier;
use Image;
use Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
{ 
     $this->middleware('auth');
}
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
         return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
         $tags= Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
         $this->validate($request, [
        'title' => 'required|max:255',
        'category_id' => 'required|integer',
        'slug'=>'required|alpha_dash|min:5|max:255',
        'body' => 'required',
        'featured_image'=>'sometimes|image'
    ]);
  
         $post=  new Post;
         $post->title = $request->title;
         $post->category_id = $request->category_id; 
         $post->slug =$request->slug;
         $post->body =Purifier::clean($request->body);
        
        if($request->hasFile('featured_image')){
          $image=$request->file('featured_image');
          $filename= time(). '.'. $image->getClientOriginalExtension();
          $location = public_path('images/'.$filename);

           Image::make($image)->resize(800, 400)->save($location);

            $post->image=$filename;

          }

         
         $post->save();
         $post->tags()->sync($request->tags, false);
         
         SESSION::flash('success','the post was successful stored to the database');
         // $request->session()->flash('status', 'Task was successful!');
         return redirect()->route('post.show', $post->id);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $post= Post::find($id); 
          return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
     
    {
         $post = Post::find($id);
         
         $categories = Category::all();
         $cats = array();

            foreach($categories as $category)
            {
              $cats[$category->id]=$category->name;
              
            }
            
         $tags = Tag::all();
        $tags2 = array();  
        foreach($tags as $tag)
            { 
             $tags2[$tag->id] = $tag->name;
            }
            return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //1 validate
         $post= Post::find($id);
         if($request->input('slug')==$post->slug){

            $this->validate($request, [
            'title' => 'required|max:255',
            'category_id' => 'required|integer',
             'body' => 'required'
        ]);   
      }else{ $this->validate($request, [
        'title' => 'required|max:255',
        'category_id' => 'required|integer',
        'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'body' => 'required',
        'featured_image'=>'image'
    ]);
 }
        
    //2. save data to the database
        $post= Post::find($id);

        $post->title=$request->input('title');
        $post->category_id = $request->input('category_id'); 

        $post->title=$request->input('slug');
        $post->body= Purifier::clean($request->input('body'));
     if($request->hasFile('featured_image')){
        //add new photo
        $image= $request->file('featured_image');
        $filename= time(). '.'.$image->getClientOriginalExtension();
        $location= public_path('images/'.$filename);
        Image::make($image)->resize(800, 400)->save($location);

         $oldfilename = $post->image;

        // upoad the picture
         $post->image = $filename;

         // delete the photo
         Storage::delete($oldfilename);
     }
        $post->save();

         if (isset($request->tags)){
          $post->tags()->sync($request->tags);
         }
          else{
            $post->tags()->sync(array());
             }
        //3 set flash with susccess message
        Session::flash('success', 'this post was successfully updated');
        //4 redirect with flash data to post.show
         return redirect()->route('post.show', $post->id);
         
    }

    /**
     * Remove the specified resource from storage. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach(); 
        
        Storage::delete($post->image);
        $post-> delete();
        Session::flash('success','the post was successfully deleted.');
 
           return redirect()->route('post.index');
    }
}
