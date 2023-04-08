@extends('layouts.back')

@section('title', 'Edit Category')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('back/datatable/datatables.min.css') }}"/>
@endsection

@section('content')

<div class="content-body"><!-- Chart -->
	<div class="row">
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Category</h4>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">
						<form action="{{ route('admin.category.update', $category->id) }}" method="post">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label>Category</label>
								<input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
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
		
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('back/datatable/datatables.min.js') }}"></script>

<script>
	$('#myTable').DataTable();

	swal("Here's the title!", "...and here's the text!");
</script>
@endsection
