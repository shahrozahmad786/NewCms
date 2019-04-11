@extends('layouts.app')


@section('content')



<div class="card card-default">
	
		<div class="card-header">

	{{isset($post) ? 'Edit Post' : "		
			Create Post"}}
		
		</div>
		<div class="card-body">


			@if($errors->any())
			<div class="alert alert-danger">
				<ul class="list-group">
					@foreach ($errors->all() as $error)

					<li class="list-group-item text-danger">
						{{$error}}
					</li>
					@endforeach
				</ul>
			</div>
			@endif
				 
				<form action="{{isset($post) ? route('post.update',$post->id) : route('post.store')}} " method="post" enctype="multipart/form-data">

					@csrf

					@if(isset($post))

						@method('PUT')

					@endif
					

               
               <div class="form-group">
		 	 	 	 	<h4 for="title">Title</h4>

		 	 	 	 		<input type="text" class="form-control" id="title" name="title"  value="{{isset($post) ? $post->title :"" }}" placeholder="Enter Name">
		 	 	</div>   



               <div class="form-group">
		 	 	 	 	<h4 for="description">Description</h4>


		 	 	 		
	<input type="text" class="form-control" id="description" name="description"  value="{{isset($post) ? $post->description :"" }}" placeholder="Enter Description">
		 	 	

		 	 	</div>  



		 	 	 <div class="form-group">
		 	 	 	 	<h4 for="content">Content</h4>


		  <input id="content" value="{{isset($post) ? $post->content :"" }}" placeholder="Enter Content"  type="hidden" name="content">
		  <trix-editor input="content"></trix-editor>

		 	 	</div>  

		 	 	   


		 	 	 <div class="form-group">
		 	 	 	 	<h4 for="published_at">Publish At</h4>

		 	 	 	 <input type="text" class="form-control" id="published_at" value="{{isset($post) ? $post->published_at :"" }}" name="published_at"> 
		 	 	</div>   
               


    @if(isset($post))
 <div class="form-group">
<img src="{{asset('storage/'.$post->image)}}" style="width: 60px">
 </div>

    @endif


		 	 	 <div class="form-group">
		 	 	 	 	<h4 for="image">Image</h4>

		 	 	 	 <input type="file" class="form-control" id="image" name="image">
		 	 	</div>   


				<div class="form-group">
				<h4 for="category">Category</h4>

				<select name="category_id" id="category_id" class="form-control">

				@foreach ($categories as $category)
				<option value="{{$category->id}}"
				@if(isset($post))

				@if($category->id===$post->category_id)



				selected
				@endif
				@endif
				>
				{{$category->name}}
				</option>

				@endforeach

				</select>



				</div>   






    	 
		 	 
		 	 <div class="box-footer">
		 	 	<button type="submit" class="btn btn-success ">
		 	 	{{isset($post) ?'Update Post' :'Add post'}}
		 	 </button>
		 	 	<a href="{{route('post.index')}}" class="btn btn-primary ">Back</a>
		 	 </div>
		</form>
		  	 </div>
</div>
		



@stop


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



<script type="text/javascript">
	flatpickr('#published_at',{

		enableTime:true
	})
</script>


@endsection


@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</script>

@stop