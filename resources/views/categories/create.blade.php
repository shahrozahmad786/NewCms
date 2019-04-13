@extends('layouts.app')


@section('content')



<div class="card card-default">
	
		<div class="card-header">

	{{isset($category) ? 'Edit Category' : "		
			Create Category"}}
		
		</div>
		<div class="card-body">


		@include('partials.errors')
				 
				<form action="{{isset($category) ? route('category.update',$category->id) : route('category.store')}}" method="post">

					@csrf

					@if(isset($category))

						@method('PUT')

					@endif
					

               
               <div class="form-group">
		 	 	 	 	<h4 for="name">Name</h4>

		 	 	 	 		<input type="text" class="form-control" id="name" name="name"  value="{{isset($category) ? $category->name :"" }}" placeholder="Enter Name">
		 	 	</div>    
                  
		 	 	 
		 	 
		 	 <div class="box-footer">
		 	 	<button type="submit" class="btn btn-success ">
		 	 	{{isset($category) ?'Update Category' :'Add category'}}
		 	 </button>
		 	 	<a href="{{route('category.index')}}" class="btn btn-primary ">Back</a>
		 	 </div>
		</form>
		  	 </div>
</div>
		



@stop