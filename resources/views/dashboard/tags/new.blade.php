@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ route('tag.register')}}" class="form-horizontal">
				@csrf
				<div class="card">
					<div class="card-header card-header-rose card-header-icon">
						<div class="card-icon">
							<i class="material-icons">tag</i>
						</div>
						<h4 class="card-title">{{__('Add Tag') }}</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-right">
								<a href="{{route('dashboard.tags')}}" class="btn btn-sm btn-rose">Back to list<div class="ripple-container"></div></a>
							</div>
						</div>
						<div class="row">
							<label for="title" class="col-sm-2 col-form-label">{{ __('Title') }}</label>

							<div class="col-sm-7">
								<div class="form-group">
									<input id="title" type="text" class="form-control"  name="title" value="{{ old('title') }}" required>

									@error('title')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row">
							<label for="slug" class="col-sm-2 col-form-label">{{ __('slug') }}</label>

							<div class="col-sm-7">
								<div class="form-group">
									<input id="slug" type="text" class="form-control"  name="slug" value="{{ old('slug') }}">

									@error('slug')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-2 col-form-label">{{ __('description') }}</label>

							<div class="col-sm-7">
								<div class="form-group">

									<textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="10"></textarea>

									@error('description')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
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