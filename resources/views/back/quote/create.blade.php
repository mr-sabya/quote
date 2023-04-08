@extends('layouts.back')

@section('title', 'Add Quote')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('back/datatable/datatables.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('back/tags/bootstrap-tagsinput.css') }}"/>
@endsection

@section('content')

<div class="content-body"><!-- Chart -->
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Add New Quote</h4>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">
						<form action="{{ route('admin.quote.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" id="title" class="form-control" value="">
								@if($errors->has('title'))
								<small style="color: red" id="title_error">{{ $errors->first('title') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Author</label>
								<select class="form-control" name="author_id" id="author_id">
									<option value="" selected disabled>--select author--</option>
									@foreach($authors as $author)
									<option value="{{ $author->id }}">{{ $author->name }}</option>
									@endforeach
								</select>
								@if($errors->has('author_id'))
								<small style="color: red" id="author_id_error">{{ $errors->first('author_id') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Category</label>
								<select class="form-control" name="category_id" id="category_id">
									<option value="" selected disabled>--select category--</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
								@if($errors->has('category_id'))
								<small style="color: red" id="category_id_error">{{ $errors->first('category_id') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Date</label>
								<input type="text" name="date" id="date" class="form-control" value="">
								@if($errors->has('date'))
								<small style="color: red" id="date_error">{{ $errors->first('date') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Quote</label>
								<textarea class="form-control" name="quote" id="quote" cols="50" rows="10"></textarea>
								@if($errors->has('quote'))
								<small style="color: red" id="quote_error">{{ $errors->first('quote') }}</small>
								@endif
							</div>

							<div class="form-group">
								<label>Tags</label>
								<input type="text" name="tags" id="tags" class="form-control">
								@if($errors->has('tags'))
								<small style="color: red" id="tags_error">{{ $errors->first('tags') }}</small>
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
<script type="text/javascript" src="{{ asset('back/tags/bootstrap-tagsinput.js') }}"></script>

<script>
	$('#myTable').DataTable();

	$('#tags').tagsinput({
		allowDuplicates: false
	});

</script>
@endsection
