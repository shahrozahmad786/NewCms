@extends('layouts.app')


@section('content')


@if(session()->has('success'))

  <div class="alert alert-success">

  	{{session()->get('success')}}
  	</div>
  	
@endif

<div class="d-flex justify-content-end mb-2">
	<a href="{{route('post.create')}}" class="btn btn-success">Add Post
	

</a>
</div>

<div class="card card-default">
	
		<div class="card-header">Post</div>

		<div class="card-body">	

			@if($posts->count() > 0)

			   <table class="table">
        	<thread>
        		<th>Image</th>
        		<th>Title</th>
        		<th>Category</th>
      {{--   		<th>Description</th>
        		<th>Content</th>
        		<th>Published At</th> --}}
        		<th></th>
        		<th></th>
        	
        	</thread>

        	<tbody>
        		@foreach ($posts as $post)
        			
        			<tr>
        			
        					

					 <td>
					 	<img src="{{'storage/'.$post->image}}" style="width: 60px">
					 </td>


					        				
                          
        					<td>{{$post->title}}</td>
        		<td>
<a href="{{route('category.edit',$post->category->id)}}">{{$post->category->name}}</a>
        			</td>

	{{-- 						<td>{{$post->description}}</td>
							<td>{{$post->content}}</td>
							<td>{{$post->published_at}}</td> --}}
							
						@if($post->trashed())
        					<td>

<form action={{route('restore-post',$post->id)}} method="POST">

	@csrf
	@method('PUT')


    <button type="submit" class="btn btn-primary btn-sm">Restore</button>

</form>	
        					</td>

        					@else

        						<td>

        						<a href="{{route('post.edit',$post->id)}}" class="btn btn-primary btn-sm">Edit</a>
        					</td>
        					@endif


							<td>


			<form action="{{route('post.destroy',$post->id)}}" method="post">

				@csrf
				@method('DELETE')

			<button type="submit" class="btn btn-danger btn-sm">
							{{$post->trashed() ? 'Delete':'Trash'}}
			</button>

							</form>


							</td>

        				
        						
        					
        					
        			</tr>
        		@endforeach
        	</tbody>
        	


        </table>

        @else
        <div class="text-center">No Posts Yet</div>


			@endif
     



	      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">

	  <form action="" method="POST" id="deletePostForm">
 	@csrf
	  	@method('DELETE')




 <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteModal">Delete Post</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p class="text-center text-bold">
             Are you sure, You want to this?
	        </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, GO Back</button>
	        <button type="submit" class="btn btn-danger">Yes, Delete</button>
	      </div>
	    </div>	  	

	  </form>
	  </div>
	</div>
		</div>
</div>


@stop

@section('scripts')

<script>
	function handleDelete(id){
		
		var form=document.getElementById('deletePostForm')
		form.action='/post/' + id

		console.log('deleting.',form)
		$('#deleteModal').modal('show')

	}

</script>

@stop