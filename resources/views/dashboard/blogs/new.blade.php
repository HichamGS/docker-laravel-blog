@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ route('blog.register')}}" enctype="multipart/form-data">
				@csrf
				<div class="card">
					<div class="card-header card-header-rose card-header-icon">
						<div class="card-icon">
							<i class="material-icons">filter_none</i>
						</div>
						<h4 class="card-title">{{ __('Add Blog') }}</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<label for="image" class="col-sm-2 col-form-label">{{ __('Picture') }}</label>
							<div class="col-sm-7">
								<div class="form-group">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
										</div>
										<div>
											<span class="btn default btn-file">
												<span class="fileinput-new"> Select image </span>
												<span class="fileinput-exists"> Change </span>
												<input type="file" name="image"> 
											</span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
										</div>
									</div>
								</div>
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
							<label for="content" class="col-sm-2 col-form-label">{{ __('Content') }}</label>

							<div class="col-sm-7">
								<div class="form-group">

									<textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="10"></textarea>

									@error('content')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row">
							<label for="excerpt" class="col-sm-2 col-form-label">{{ __('excerpt') }}</label>

							<div class="col-sm-7">
								<div class="form-group">

									<textarea id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" rows="5"></textarea>

									@error('excerpt')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						@if (!empty($categories))
						<div class="row">
							<label for="categories" class="col-sm-2 col-form-label">{{ __('Categories') }}</label>

							<div class="col-sm-7">
								<div class="form-group">	
									<select class="selectpicker col-sm-12 pl-0 pr-0" name="categories[]" data-style="select-with-transition" multiple="">
										@foreach ($categories as $category)
										<option value="{{$category->id}}">{{ $category->title }}</option>
										@endforeach
									</select>
									@error('categories')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						@endif
						@if (!empty($tags))
						<div class="row">
							<label for="tags" class="col-sm-2 col-form-label">{{ __('Tags') }}</label>

							<div class="col-sm-7">
								<div class="form-group">

									<select class="selectpicker col-sm-12 pl-0 pr-0" name="tags[]" data-style="select-with-transition" multiple="">
										@foreach ($tags as $tag)
										<option value="{{$tag->id}}">{{ $tag->title }}</option>
										@endforeach
									</select>

									@error('tags')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						@endif
						<div class="row">
							<label class="col-sm-2 col-form-label label-checkbox">Status</label>
							<div class="col-sm-10 checkbox-radios">
								@foreach( config('app.blog_status') as $key => $status )
									<div class="form-check">
										<label class="form-check-label">
											<input name="status" class="form-check-input" id="{{ $status }}" value="{{ $key }}" type="radio" {{ ($key=="0")? "checked" : "" }}> {{ $status }}
											<span class="circle">
												<span class="check"></span>
											</span>
										</label>
									</div>
								@endforeach
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
		selector:'textarea',
		width: 900,
		height: 300
	});
</script>
@endsection