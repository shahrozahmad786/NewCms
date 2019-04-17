<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('VerifyCategoriesCount')->only([
          'create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {


        $image=$request->image->store('posts');

        $post=Post::create([
        
        'title'=>$request->title,
        'description'=>$request->description,
        'content'=>$request->content,
        'image'=>$image,
        'published_at'=>$request->published_at,
        'category_id'=>$request->category_id,
        'user_id'=>auth()->user()->id,


        ]);
        if($request->tags)

        {
            $post->tags()->attach($request->tags);
        }
        session()->flash('success','Post added successfuly');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        // dd($post);
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)


    {
        $data=$request->only(['title','description','published_at','content','category_id']);


        if($request->hasFile('image')){
            $image=$request->image->store('posts');

            Storage::delete($post->image);

            $data['image']=$image;



        }


        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }

        $post->update($data);


          session()->flash('success','Post updated successfully');
             return redirect()->route('post.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post=Post::withTrashed()->where('id',$id)->firstOrFail();

         // dd($post);


          if($post->trashed())
          {
            Storage::delete($post->image);
            $post->forceDelete();

          }else
          {
             $post->delete();
          }
       


          session()->flash('success','Post Trashed successfully');
             return redirect()->route('post.index');
    }


    public function trashed()
    {
        $trashed=Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trashed);
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();

        $post->restore();
        session()->flash('success','Post restore successfully');
        return redirect()->back();
    }
}
