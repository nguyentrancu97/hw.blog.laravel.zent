@extends('admin.layouts.master')
@section('content')
<div  style="margin-top: 20px;" >
	<form   data-url="{{asset('post/store')}}" method="POST" role="form" id="form-add" enctype="multipart/form-data">
		<legend align="center">Form Add</legend>
		@csrf
		<div class="col-lg-8">

			
			<div class="form-group">
				<label for="">Title</label>
				<input type="text"  class="form-control" name="title" id="title-add" placeholder="Input field">
			</div>

			<div class="form-group">
				<label for="">Description</label>
				<textarea type="text" class="form-control" id="description-add" name="description" placeholder="Input field"></textarea>

			</div>

			<div class="form-group">
				<label for="">Content</label>
				<textarea type="text"  class="form-control" id="content-add" name="content" placeholder="Input field"></textarea>

			</div>


		</div>

		<div class="col-lg-4">
			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" class="form-control">

					@foreach($cate as $cate)
					<option value="{{$cate->id}}">{{$cate->name}}</option>
					@endforeach   
				</select>
			</div>

			<div class="form-group">
				<label for="">Image</label>
				<input type="file" class="form-control"  id=""   name="image" >
			</div>
			<label for="">Tag</label>
			<div class="form-group" style="background: white; border: solid 1px #d2d6de;">
				
				<select id="tag" multiple data-role="tagsinput">
					<option value="Amsterdam">Amsterdam</option>
					<option value="Washington">Washington</option>
					<option value="Sydney">Sydney</option>
					<option value="Beijing">Beijing</option>
					<option value="Cairo,Hanoi">Cairo,Hanoi</option>
				</select>
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		


	</form>
</div>

@endsection
@push('scripts')
<script>
	$(function(){
		// CKEDITOR.replace( 'content-add');
		// CKEDITOR.replace( 'description-add');

		$(document).on('submit','#form-add',function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			var formData = new FormData($(this)[0]);
			var arr = $("#tag").tagsinput('items');
			for(var i = 0; i < arr.length; i++){
				formData.append('tag[]',arr[i]);
			}
			

			$.ajax({
				url: url,
				type: 'POST',
				data: formData,
				success: function (response) {
					toastr.success('success');
				},
				cache: false,
				processData: false,
				contentType: false
			});

		});

	});
</script>
@endpush