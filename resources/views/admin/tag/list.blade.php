@extends('admin.layouts.master')
@section('content')
<section class="content-header">
	
	<div class="row">
		<div class="col-xs-6">
			<h3><i class="glyphicon glyphicon-bookmark"> </i>Quản lí tag</h3>
		</div>	
		<div class="col-xs-2 col-xs-offset-4"  style="margin-top: 24px;">
			<a href="" id="add" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Thêm</a>
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
	<table class="table table-bordered table-striped table-hover" id="my-table"  width="100%" cellspacing="0" style="background: white;">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Created_at</th>

				<th>Action</th>
			</tr>
		</thead>
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
				<form method="POST" role="form" id="form-add" enctype="multipart/form-data">
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
				<h3 class="modal-title" align="center">------TAG------</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" align="center">
				<b>Name:</b>
				<p id="name-detail"></p>
				<b>Slug:</b>
				<p id="slug-detail" ></p>
				<b>Create_at:</b>
				<p id="created_at-detail" ></p>
				

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
					<legend>Edit Tag</legend>
					@csrf
					<div class="form-group">
						<label for="">name</label>
						<input type="text" class="form-control" id="name-edit" placeholder="Input field" value="">
					</div>
					<div class="form-group">
						<label for="">slug</label>
						<input class="form-control" name="slug" id="slug-edit" placeholder="Input field" value="">
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
			ajax:'getTag',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'slug', name: 'slug' },

			{ data: 'created_at', name: 'created_at' },
			{ data: 'action', name: 'action' },

			
			]
		});
		$(document).on('click','#add',function(e){
			
			e.preventDefault();
			$('#modal-add').modal('show');
			$('#form-add').attr('data-url','{{asset('tag/store')}}');
			
			
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
				},
					success: function(response){
						$('#modal-add').modal('hide');
						toastr.success('success');
						setTimeout(function(){
							window.location.reload();
						},1000);
					},

			})
			
			
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
						setTimeout(function(){
							window.location.reload();
						},1000);
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
					
					$('#name-detail').html(response.data.name);
					$('#slug-detail').html(response.data.slug);
					$('#created_at-detail').text(response.data.created_at);

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
					$('#name-edit').val(response.data.name);
					$('#slug-edit').val(response.data.slug);
					
					$('#edit-form').attr('data-url','{{asset('')}}tag/update/'+response.data.id);	

				}
			})
		});
		$(document).on('submit','#edit-form',function(e){
			e.preventDefault();
			var url = $(this).attr('data-url');

			$.ajax({
				type:'put',
				url:url,
				data:{
					'name' : $('#name-edit').val(),
					'slug' : $('#slug-edit').val(),
					
				},
				success:function(response){
					$('#edit_modal').modal('hide');
					toastr.success('success');
					setTimeout(function(){
						window.location.reload();
					},1000);
					
				}

			})

		});
	});

	
</script>
@endpush
{{-- <style type="text/css" "></style> --}}