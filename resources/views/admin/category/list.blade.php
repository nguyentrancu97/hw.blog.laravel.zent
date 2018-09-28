@extends('admin.layouts.master')
@section('content')
<section class="content-header">
	
	<div class="row">
		<div class="col-xs-6">
			<h3><i class="glyphicon glyphicon-bookmark"> </i>Quản lí danh mục</h3>
		</div>	
		<div class="col-xs-2 col-xs-offset-4"  style="margin-top: 24px;">
			<a id="add" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Thêm</a>
		</div>

	</div>
	
</section>

<!-- Main content -->
<section class="content" style="border: 1px solid black; margin-left: 5px;">
	{{-- <div class="row" >
		<a><i class="glyphicon glyphicon-th-list" style="color: black; margin-left: 15px;"></i></a>
	</div> --}}
	{{-- drop category --}}
	<div class="dropdown" style="margin: 10px 0;">
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<i class="glyphicon glyphicon-th-list"></i>
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			<li><a href="#">Action</a></li>
			
			
		</ul>
	</div>
	<!-- Default box -->

	<table id="my-table" class="table table-bordered table-striped table-hover" class="display" width="100%" cellspacing="0" style="background: white;">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				
				<th>Description</th>
				
				<th>Slug</th>
				
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
				<h3 class="modal-title">-----Category-----</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form  action="" method="POST" role="form" id="form-add" enctype="multipart/form-data">
					<legend>Form Add</legend>
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name" id="name-add" placeholder="Input field">
					</div>

					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" class="form-control" name="slug" id="slug-add" placeholder="Input field">

					</div>
					<div class="form-group">
						<label for="">description</label>
						<textarea type="text" class="form-control" id="description-add" name="description-add" placeholder="Input field"></textarea>

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
<!-- Modal show-->
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" align="center">-----Category-----</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" align="center">
				<b>Name:</b>
				<p id="name-detail"></p>
				<b>Description:</b>
				<p id="description-detail" ></p>
				<b>Slug:</b>
				<p id="slug-detail"></p>
				<b>Create_at:</b>
				<p id="created_at-detail"></p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>

{{-- modal-edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">-----Category-----</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form  action="" method="POST" role="form" id="form-edit" enctype="multipart/form-data">
					<legend>Form Edit</legend>
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name" id="name-edit" placeholder="Input field">
					</div>

					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" class="form-control" name="slug" id="slug-edit" placeholder="Input field">

					</div>
					<div class="form-group">
						<label for="">description</label>
						<textarea type="text" class="form-control" id="description-edit" name="description-add" placeholder="Input field"></textarea>

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
		$('#my-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: 'getCate',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			
			{ data: 'description', name: 'description' },
			{ data: 'slug', name: 'slug' },
			{ data: 'created_at', name: 'created_at' },
			{ data: 'action', name: 'action' },

			]
		});
		$(document).on('click','#edit',function(e){
			e.preventDefault();
			
			
			var url = $(this).attr('data-url');
			$.ajax({
				type:'get',
				url:url,
				success:function(response){
					$('#modal-edit').modal('show');
					$('#name-edit').val(response.data.name);
					$('#slug-edit').val(response.data.slug);
					CKEDITOR.replace('description-edit');
					$('#description-edit').html(response.data.description);
					$('#form-edit').attr('data-url','{{asset('cate/update')}}/'+response.data.id);
				}
			})

		});

		$(document).on('submit','#form-edit',function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			$.ajax({
				type:'put',
				url:url,
				data:{
					'name': $('#name-edit').val(),
					'slug': $('#slug-edit').val(),
					'description': CKEDITOR.instances['description-edit'].getData(),
				},
				success:function(response){
					$('#modal-edit').modal('hide');
					toastr.success('success');
					setTimeout(function(){
						window.location.reload();
					},1000);
				}
			})
		});

		$(document).on('click','#add',function(e){
			e.preventDefault();
			$('#modal-add').modal('show');

			$('#form-add').attr('data-url','{{asset('cate/store')}}');
			CKEDITOR.replace( 'description-add');
		});
		$(document).on('submit','#form-add',function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');
			$.ajax({
				type:'post',
				url:url,
				data:{
					'name': $('#name-add').val(),
					'slug': $('#slug-add').val(),
					'description': CKEDITOR.instances['description-add'].getData(),
				},
				success:function(response){
					$('#modal-add').modal('hide');
					toastr.success('success');
					setTimeout(function(){
						window.location.reload();
					},1000);
				}
			})
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
					$('#name-detail').html(response.data.name);
					
					$('#slug-detail').html(response.data.slug);
					$('#description-detail').html(response.data.description);
					$('#created_at-detail').html(response.data.created_at);
					
					
				},
				error:function(){

				}
			})
		});

		$(document).on('click','#delete',function(e){
			
			e.preventDefault();
			var url = $(this).attr('data-url');
			if(confirm("Are you ok?")){
				$.ajax({
					type:'delete',
					url:url,
					success: function(response){
						toastr.success('success');
						setTimeout(function(){
							window.location.reload();
						},1000);
					},

				})
			};
			
		});
		
	});

	
</script>
@endpush