@extends('layouts.back')

@section('title', 'Add Author')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('back/datatable/datatables.min.css') }}"/>
@endsection

@section('content')

<div class="content-body"><!-- Chart -->
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Add New AUthor</h4>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">
						<form action="{{ route('admin.author.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" id="name" class="form-control" value="">
								@if($errors->has('name'))
								<small style="color: red" id="name_error">{{ $errors->first('name') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Year</label>
								<input type="text" name="year" id="year" class="form-control" value="">
								@if($errors->has('year'))
								<small style="color: red" id="year_error">{{ $errors->first('year') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Short Description</label>
								<textarea class="form-control" name="short_description" id="short_description"></textarea>
								@if($errors->has('short_description'))
								<small style="color: red" id="short_description_error">{{ $errors->first('short_description') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Image</label>
								<input type="file" name="image" id="image" class="form-control" value="">
								@if($errors->has('image'))
								<small style="color: red" id="image_error">{{ $errors->first('image') }}</small>
								@endif
							</div>

							<div class="form-check form-group">
								<input type="checkbox" class="form-check-input" id="is_popular" name="is_popular" value="1">
								<label class="form-check-label" for="is_popular">Popular</label>
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

</script>
@endsection
