@extends('layouts.app')


@section('content')



<div class="card card-default">
	
		<div class="card-header">

	{{isset($tags) ? 'Edit Tag' : "		
			Create Tags"}}
		
		</div>
		<div class="card-body">


	@include('partials.errors')
				 
				<form action="{{isset($tags) ? route('tag.update',$tags->id) : route('tag.store')}}" method="post">

					@csrf

					@if(isset($tags))

						@method('PUT')

					@endif
					

               
               <div class="form-group">
		 	 	 	 	<h4 for="name">Name</h4>

		 	 	 	 		<input type="text" class="form-control" id="name" name="name"  value="{{isset($tags) ? $tags->name :"" }}" placeholder="Enter Name">
		 	 	</div>    
                  
		 	 	 
		 	 
		 	 <div class="box-footer">
		 	 	<button type="submit" class="btn btn-success ">
		 	 	{{isset($tags) ?'Update Tag' :'Add Tags'}}
		 	 </button>
		 	 	<a href="{{route('tag.index')}}" class="btn btn-primary ">Back</a>
		 	 </div>
		</form>
		  	 </div>
</div>
		



@stop