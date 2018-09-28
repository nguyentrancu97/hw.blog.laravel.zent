@extends('admin.layouts.master')
@section('content')
<section class="content-header">
	
	<div class="row">
		<div class="col-xs-6">
			<h3><i class="glyphicon glyphicon-bookmark"> </i>Quản lí bài viết</h3>
		</div>	
		<div class="col-xs-2 col-xs-offset-4"  style="margin-top: 24px;">
			<a id="add" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Thêm</a>
		</div>

	</div>
	
</section>

<!-- Main content -->
<section class="content" style="border: 1px solid black; margin-left: 5px;">
	
	{{-- drop category --}}
	<div class="dropdown" style="margin: 10px 0;">
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<i class="glyphicon glyphicon-th-list"></i>
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			
			<li><a href=""></a>Action</li>
			
			
		</ul>
	</div>
	<!-- Default box -->
	
	<table id="my-table" class="table table-bordered table-hover table-striped" class="display" cellspacing="0" width="100%" style="background: white;" >
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Thumbnail</th>
				<th>Content</th>
				<th>Description</th>
				<th>Category_name</th>
				<th>Created_at</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	
	


	

</section>
{{-- modal-add --}}
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="cate"></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form   data-url="{{asset('post/store')}}" method="POST" role="form" id="form-add" enctype="multipart/form-data">
					<legend align="center">Form Add</legend>
					@csrf
					

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

					<div class="form-group">
						<label for="">Category</label>
						<select name="category_id" class="form-control">

							@foreach($cates as $cate)
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

						</select>
					</div>


					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>
<!-- Modal show-->
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="cate"></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h1 id="title-detail"></h1>
				<img id="thumbnail-detail" style="width: 200px; height: auto;"   src="">
				<p id="description-detail" ></p>
				<p id="content-detail"></p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>
{{-- modal-edit --}}
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="cate"></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="edit-form" method="POST" role="form">
					<legend>Edit Post</legend>
					{{-- @csrf --}}
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" class="form-control" id="title-edit" placeholder="Input field" value="" name="title">
					</div>
					<div class="form-group">
						<label for="">Description</label>
						<textarea style="height: 200px;" class="form-control" name="description" id="description-edit" placeholder="Input field"></textarea>
						
					</div>
					
					<div class="form-group">
						<label for="">Content</label>
						
						<textarea type="text" style="height: 300px;" class="form-control" name="content" id="content-edit" placeholder="Input field"></textarea>
					</div>
					<div class="form-group">
						<label for="">Category</label>
						<select name="category"  class="form-control">

							@foreach($cates as $cate)
							<option value="{{$cate->id}}" id="{{$cate->id}}">{{$cate->name}}</option>
							@endforeach   
						</select>
					</div>

					<div class="form-group">
						<label for="">Image</label>
						<input type="file" class="form-control"  id="image" value=""  name="thumbnail" >
					</div>
					<label for="">Tag</label>
					<div class="form-group" style="background: white; border: solid 1px #d2d6de;">
						
						<select id="tag_edit" name="tag" multiple data-role="tagsinput">
							<option value=""></option>

						</select>
					</div>

					

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>


<script>
	$(function() {
		CKEDITOR.replace( 'description-edit');
		CKEDITOR.replace( 'content-edit');
		$('#my-table').DataTable({
			processing: true,
			order:[],
			serverSide: true,
			ajax:'getPost',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'title', name: 'title' },
			{ data: 'thumbnail', name: 'thumbnail' },
			{ data: 'content', name: 'content' },
			
			{ data: 'description', name: 'description' },
			{ data: 'category_name', name: 'category_name' },
			{ data: 'created_at', name: 'created_at' },

			{ data: 'action', name: 'action' },

			
			]
		});
		$(document).on('click','#add',function(e){
			$('#modal-add').modal('show');
			CKEDITOR.replace( 'content-add');
			CKEDITOR.replace( 'description-add');

		});
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
					$('#modal-add').modal('hide');
					toastr.success('success');
					$('#my-table').DataTable().ajax.reload(null,false);
				},
				cache: false,
				processData: false,
				contentType: false
			});

		});
		$(document).on('click','#delete',function(e){
			
			e.preventDefault();
			var url = $(this).attr('data-url');
			if(confirm("Are You OK?")){
				$.ajax({
					type:'delete',
					url:url,
					success: function(response){
						toastr.success('success');
						$('#my-table').DataTable().ajax.reload(null,false);
					},

				})
			}
			
		});

		$(document).on('click','#detail',function(e){
			
			e.preventDefault();
			var url = $(this).attr('data-url');
			$.ajax({
				type:'get',
				url:url,
				success: function(response){
					

					$('#detail_modal').modal("show");
					console.log(response);
					$('h1#title-detail').html(response.data.title);
					$('#description-detail').html(response.data.description);
					$('#content-detail').html(response.data.content);
					$('#thumbnail-detail').attr('src','{{asset('storage')}}/' +response.data.thumbnail);
					$('h3#cate').html(response.cate.name);
				},
				error:function(){

				}


			})
		});

		$(document).on('click','#edit',function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			$.ajax({
				type:'get',
				url: url,
				success:function(response){
					$('#edit_modal').modal('show');
					$('#title-edit').val(response.data.title);
					CKEDITOR.instances['description-edit'].setData(response.data.description);
					// $('#description-edit').text(response.data.description);
					CKEDITOR.instances['content-edit'].setData(response.data.content);
					
					$('#edit-form').attr('data-url','{{asset('')}}update/'+response.data.id);
					$('#'+response.data.category_id+'').attr('selected','selected');
					$('#image').attr({'value':response.data.thumbnail});
					for(var i = 0;i < response.tag.length;i++){
						$('#tag_edit').tagsinput('add', response.tag[i].name);
					}

					
					
					

				}
			})
		});
		$(document).on('submit','#edit-form',function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			var formData = new FormData($(this)[0]);
			var arr = $("#tag_edit").tagsinput('items');
			

			$.ajax({
				type:'POST',
				url:url,
				contentType: false,
				cache: false,
				processData: false,
				
				data: formData,
				
				success:function(response){
					$('#edit_modal').modal('hide');
					$('#my-table').DataTable().ajax.reload(null,false);
				}

			})

		});
	});

	
</script>
@endpush
{{-- <style type="text/css" "></style> --}}