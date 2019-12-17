<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//use auth

    public function __construct()
    {
         $this->middleware('auth',['except' => ['index','show']]);

       // $this->middleware('auth');
    }


    public function index()
    {
        //
//$posts = Post::all();
     

        $posts= array(
            'posts' => Post::orderBy('created_at', 'DESC')->paginate(10),
            'id' => 1
        ); 

    
 
        return view('posts.index')->with($posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating  create form request

        $this->validate($request,[
                'title' => 'required',
                'body' => 'required',
                'post_image' => 'image|nullable|max:1999'



        ]);


        //hadle file upload

        if($request->hasFile('post_image')){
                //get filename extension
                $filenameExtension= $request->file('post_image')->getClientOriginalName();

                //get filename
                        $filename= pathinfo($filenameExtension,PATHINFO_FILENAME);

                //get extension
                $extension= $request->file('post_image')->getClientOriginalExtension();


                //filename store

                $fileStore= $filename.'_'.time().'.'.$extension;

                //uploading image into storage use artisan storage:link
                $path=$request->file('post_image')->storeAs('public/post_images',$fileStore);
        }
        else{
            $fileStore='default.jpg';
        }

    //use tinker method to insert data into database
                $post= new Post;

                $post->title= $request->input('title');
                $post->body= $request->input('body');
                $post->user_id=auth()->user()->id;
                $post->post_image=$fileStore;
                $post->save();

                return redirect('/')->with('success', 'Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

         $posts= Post::find($id);

         return view('posts.show')->with('posts' , $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts= Post::find($id);

        if(auth()->user()->id !==$posts->user_id){
           return redirect('/post')->with('error', 'Must edit your post only, Unauthorized Access');
        }
        
        return view('posts.edit')->with('posts' , $posts);
        
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
        //validating update form
    

    
    $this->validate($request,[
        'title' => 'required',
        'body' => 'required',
        'post_image' => 'image|nullable|max:1999'



]);


//hadle file upload

if($request->hasFile('post_image')){
        //get filename extension
        $filenameExtension= $request->file('post_image')->getClientOriginalName();

        //get filename
                $filename= pathinfo($filenameExtension,PATHINFO_FILENAME);

        //get extension
        $extension= $request->file('post_image')->getClientOriginalExtension();


        //filename store

        $fileStore= $filename.'_'.time().'.'.$extension;

        //uploading image into storage use artisan storage:link
        $path=$request->file('post_image')->storeAs('public/post_images',$fileStore);
}

//use tinker method to updating data into database
            $post= Post::find($id);

            $post->title= $request->input('title');
            $post->body= $request->input('body');

            if($request->file('post_image')){
                $post->post_image= $fileStore;
            }
            $post->save();

            return redirect('/post')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::find($id);

     
        if(auth()->user()->id !==$post->user_id){
            return redirect('/post')->with('error', 'Must delete your post created , Unauthorized Access');
         }
            
         if($post->post_image != 'default.jpg'){
                Storage::delete('public/post_images/'.$post->post_image); 
         }


        $post->delete();
        return redirect('/post')->with('success', 'Post has been deleted');
    }
}
