@extends('layouts.app')


@section('content')

@include('partials.success')



@if(session()->has('error'))

  <div class="alert alert-danger">

  	{{session()->get('error')}}
  	</div>
  	
@endif





<div class="d-flex justify-content-end mb-2">
	<a href="{{route('tag.create')}}" class="btn btn-success">Add Tag
	

</a>
</div>

<div class="card card-default">
	
		<div class="card-header">Tags</div>

		<div class="card-body">	


			
		@if($tags->count() > 0)
        <table class="table">
        	<thread>
        		<th>id</th>
        		<th>Name</th>
        	<th>Post Count</th>
        		<th>Edit</th>
        		<th>Delete</th>
        	
        	</thread>

        	<tbody>
        		@foreach ($tags as $tag)
        			
        			<tr>
        				<td>{{$tag->id}}</td>
                          
        					<td>{{$tag->name}}</td>
        					</td>

        					<td>{{$tag->posts()->count()}}</td>


        					<td>
        						<a href="{{route('tag.edit',$tag->id)}}" class="btn btn-primary btn-sm">Edit</a>
        					</td>

						<td>


						<button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">
							Delete
						</button>

        					</td>

        				
        						
        					
        					
        			</tr>
        		@endforeach
        	</tbody>
        	


        </table>


        @else
          <div class="text-center">No Tags Yet</div>
@endif

	      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	   {{--  <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteModal">Delete Category</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, GO Back</button>
	        <button type="button" class="btn btn-danger">Yes, Delete</button>
	      </div>
	    </div> --}}
	  <form action="" method="POST" id="deleteTagForm">
 	@csrf
	  	@method('DELETE')




 <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteModal">Delete Tag</h5>
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
		
		var form=document.getElementById('deleteTagForm')
		form.action='/tag/' + id// giving url not route

		console.log('deleting.',form)
		$('#deleteModal').modal('show')

	}

</script>

@stop