<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\CreatetagRequest;
use App\Http\Requests\Tag\UpdatetagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Category::first()->posts());
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatetagRequest $request)
    {
         Tag::create([
        
        'name'=>$request->name

        ]);
        session()->flash('success','Tag added successfuly');

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
         return view('tags.create')->with('tags',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetagRequest $request, Tag $tag)
    {
         // Model binding to get the id
       $tag->update([
      'name'=>$request->name,
       ]);

       session()->flash('success',' Tag updated Successfully');
       
       return redirect()->route('tag.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {


       if($tag->posts->count() > 0)
       {
    
   
           session()->flash('error','Tag cannot be deleted: It is being used in some post');

       return redirect()->back();

       }


        $tag->delete();

       session()->flash('success','Tag Deleted successfully');

       return redirect()->route('tag.index');
    }
}
