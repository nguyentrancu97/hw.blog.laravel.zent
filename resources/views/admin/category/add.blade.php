@extends('admin.layouts.master')
@section('content')
<div class="container" style="margin-top: 20px;">
	<div class="col-lg-8">
		<form  action="{{asset('cate/store')}}" method="POST" role="form" id="form-add" enctype="multipart/form-data">
			<legend>Form Add</legend>
			@csrf
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Input field">
			</div>

			<div class="form-group">
				<label for="">Slug</label>
				<input type="text" class="form-control" name="slug" id="slug" placeholder="Input field">

			</div>
			<div class="form-group">
				<label for="">description</label>
				<textarea type="text" class="form-control" id="description" name="description" placeholder="Input field"></textarea>

			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<div class="col-lg-4">
		
	</div>

	
</div>

@endsection
@push('scripts')
<script>
	$(function(){
		
		CKEDITOR.replace( 'description');

	});
</script>
@endpush