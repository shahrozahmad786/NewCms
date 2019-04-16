<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
       return view('users.index')->with('users',User::all());	
    }


    public function edit()
    {
        return view('users.edit')->with('user',auth()->user());

    }


    public function update(UpdateProfileRequest $request)
    {


// dd($request->all());
        $user=auth()->user();
        
        $user->update([

        'name' => $request->name,
        'about' =>$request->about

        ]);




          session()->flash('success','USer Updated successfuly');

          return redirect()->back();
        

    }

    public function makeAdmin(User $user)
    {
    	  $user->role='Admin';
  
    	  $user->save();


    	  session()->flash('success','USer has now Admin Rights');

    	  return redirect()->route('users.index');
    }
}
