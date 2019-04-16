@extends('layouts.app')


@section('content')


@include('partials.success')



@include('partials.errors')

<div class="d-flex justify-content-end mb-2">
	<a href="" class="btn btn-success">Add User
	

</a>
</div>

<div class="card card-default">
	
		<div class="card-header">Users</div>

		<div class="card-body">	

			@if($users->count() > 0)

			   <table class="table">
        	<thread>
        		<th>Id</th>
                        <th>Image</th>
        		<th>Name</th>
        		<th>Role</th>
        		<th>Email</th>
        		<th>Rights</th>
        		
     
        	</thread>

        	<tbody>
        		@foreach ($users as $user)
        			
        			<tr>

        				<td>{{$user->id}}</td>
                                        <td><img src="{{Gravatar::src($user->email)}}" alt=""></td>
        				<td>{{$user->name}}</td>
        				<td>{{$user->role}}</td>
        				<td>{{$user->email}}</td>

        				@if(!$user->isAdmin())
        				<td>
        					
 <form action={{route('users.make-admin',$user->id)}} method="Post">
@csrf


<button type="submit" class="btn btn-sm btn-success">Make Admin</button>
                                                
                                                
          </form>        

        				</td>
        				@else
        				<td><button  class="btn btn-sm btn-danger">Admin</button></td>
        			@endif
        					
        			</tr>
        		@endforeach
        	</tbody>
        	


        </table>

        @else
        <div class="text-center">No Users Yet</div>


			@endif
     

@stop

