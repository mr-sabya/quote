@extends('layouts.back')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('back/datatable/datatables.min.css') }}"/>
@endsection

@section('content')

<div class="content-body"><!-- Chart -->
	<div class="row">
		
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex">
					<h4 class="card-title">Categories</h4>
					<div class="text-right w-100">
						<a class="btn btn-icon btn-dark" href="{{ route('admin.author.create')}}"><i class="la la-plus"></i> Add Author</a>
					</div>
				</div>
				
				<div class="card-content collapse show">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped text-center" id="myTable">
								<thead>
									<tr>
										<th>#</th>
										<th>Image</th>
										<th>Name</th>
										<th>Year</th>
										<th>Popular</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($authors as $author)
									<tr>
										<th scope="row">{{ $loop->index+1 }}</th>
										<td>
											<img src="{{ url('upload/images', $author->image)}}" style="width: 60px">
										</td>
										<td>{{ $author->name }}</td>
										<td>{{ $author->year }}</td>
										<td>
											@if($author->is_popular == 1)
											<span style="color:#008000">Yes</span>
											@else
											<span style="color:#FF0000">No</span>
											@endif
										</td>
										<td>
											<a class="btn btn-primary btn-sm" href="{{ route('admin.author.edit', $author->id)}}"><i class="la la-pencil"></i></a>
											<a class="btn btn-danger btn-sm" href="{{ route('admin.author.edit', $author->id)}}"><i class="la la-trash"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('back/datatable/datatables.min.js') }}"></script>

<script>
	$('#myTable').DataTable();
</script>
@endsection
