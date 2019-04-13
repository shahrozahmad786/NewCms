@extends('layouts.app')


@section('content')



<div class="card card-default">
	
		<div class="card-header">

	{{isset($post) ? 'Edit Post' : "		
			Create Post"}}
		
		</div>
		<div class="card-body">

			@include('partials.errors')


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


		 	 	 		
	<textarea  class="form-control" id="description" name="description" cols="5" rows="5">
		{{isset($post) ?$post->description :""}}
	</textarea>
		 	 	

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
<img src="{{asset('storage/'.$post->image)}}" style="width: 100%">
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


@if($tags->count() >0)
	 	 <div class="form-group">
	 	 	 	<h4 for="tags"> Tags</h4>

	 	 	 <select name="tags[]" id="tags" class="form-control tags-selector" multiple="multiple">
	 	    

	 
	
	 	 	 	@foreach ($tags as $tag)
	 	 	 	<option value="{{$tag->id}}"


	 	 	 		@if(isset($post))
	 	 	 		@if($post->hasTag($tag->id))
	 	 	 		selected

	 	 	 		@endif
	 	 	 		@endif 


	 	 	 		>

	 	 	 		{{$tag->name}}


	 	 	 	</option>
	 	 	 	@endforeach

	 	 	 </select>

	 	</div>   

@endif


    	 
		 	 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




<script type="text/javascript">
	flatpickr('#published_at',{

		enableTime:true
	})


	$(document).ready(function() {
    $('.tags-selector').select2();
});
</script>


@endsection


@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</script>

@stop