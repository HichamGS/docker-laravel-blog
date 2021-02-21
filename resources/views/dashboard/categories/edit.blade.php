@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		@include('dashboard.layouts.sidebar')
		<div class="col-md-12">
			<form method="POST" action="{{ route('category.update',['id' => $category->id]) }}">
				{!! method_field("PATCH") !!}
				{!! csrf_field() !!}
				<div class="card">
					<div class="card-header card-header-rose card-header-icon">
						<div class="card-icon">
							<i class="material-icons">category</i>
						</div>
						<h4 class="card-title">{{__('Edit Category') }}</h4>
					</div>

					@if(isset($message)) <div class="alert alert-success" role="alert"> {{ $message }} </div>@endif

					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-right">
								<a href="{{route('dashboard.categories')}}" class="btn btn-sm btn-rose">Back to list<div class="ripple-container"></div></a>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

							<div class="col-md-6">
								<input id="title" type="text" class="form-control"  name="title" value="{{ $category->title }}" required>

								@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('slug') }}</label>

							<div class="col-md-6">
								<input id="slug" type="text" class="form-control"  name="slug" value="{{ $category->slug }}">

								@error('slug')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

							<div class="col-md-6">
								<textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="10">{{$category->description}}</textarea>

								@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="categories" class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>
							<div class="col-md-6">
								<select class="form-control" name="parent">
									<option value="">{{ __('None')}}</option>
									@if (!empty($categories))
										@foreach ($categories as $_category)
											<option @if($category->parent_category && $category->parent_category->id == $_category->id) selected="selected" @endif  value="{{$_category->id}}">{{ str_repeat('_', $_category->level)." " }}{{ $_category->title }}</option>
										@endforeach
									@endif
								</select>

								@error('categories')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="card-footer ml-auto mr-auto">
						<button type="submit" class="btn btn-rose">{{ __('Save') }}</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	tinymce.init({
		selector:'textarea#description',
		width: 900,
		height: 300
	});
</script>
@endsection