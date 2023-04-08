@extends('layouts.back')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('back/datatable/datatables.min.css') }}"/>
@endsection

@section('content')

<div class="content-body"><!-- Chart -->
	<div class="row">
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Add Category</h4>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">
						<form action="{{ route('admin.category.store') }}" method="post">
							@csrf
							<div class="form-group">
								<label>Category</label>
								<input type="text" name="name" id="name" class="form-control">
								@if($errors->has('name'))
								<small style="color: red" id="name_error">{{ $errors->first('name') }}</small>
								@endif
							</div>
							<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Categories</h4>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped w-100" id="myTable">
								<thead>
									<tr>
										<th>#</th>
										<th>Category</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr>
										<th scope="row">{{ $loop->index+1 }}</th>
										<td>{{ $category->name }}</td>
										<td>{{ $category->slug }}</td>
										<td>
											<a class="btn btn-primary btn-sm" href="{{ route('admin.category.edit', $category->id)}}"><i class="la la-pencil"></i></a>
											<a class="btn btn-danger btn-sm" href="{{ route('admin.category.edit', $category->id)}}"><i class="la la-trash"></i></a>
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
