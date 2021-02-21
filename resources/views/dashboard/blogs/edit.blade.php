@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ route('blog.update', ['id' => $blog->id])}}" enctype="multipart/form-data">
				{!! method_field("PATCH") !!}
				{!! csrf_field() !!}
				<div class="card">
					<div class="card-header card-header-rose card-header-icon">
						<div class="card-icon">
							<i class="material-icons">filter_none</i>
						</div>
						<h4 class="card-title">{{ __('Edit Blog') }}</h4>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-right">
								<a href="{{route('dashboard.blogs')}}" class="btn btn-sm btn-rose">Back to list<div class="ripple-container"></div></a>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Picture</label>
							<div class="col-sm-7">
								<div class="fileinput fileinput-new text-center" data-provides="fileinput">
									<div class="fileinput-new thumbnail">
										<img src="{{ $blog->image->blog_image_path }}" alt="">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail"></div>
									<div>
										<span class="btn btn-rose btn-file">
											<span class="fileinput-new">Select image</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="image" id="input-picture">
										</span>
										<a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label for="title" class="col-sm-2 col-form-label">{{ __('Title') }}</label>

							<div class="col-sm-7">
								<div class="form-group">
									<input id="title" type="text" class="form-control"  name="title" value="{{ $blog->title }}" required>

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
									<input id="slug" type="text" class="form-control"  name="slug" value="{{ $blog->slug }}">

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
									<textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required rows="10">{{ $blog->content }}</textarea>

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
									<textarea id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" rows="5">{{ $blog->excerpt }}</textarea>

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
										<option @if(!empty($blogCategories) && in_array($category->id, $blogCategories)) selected="selected" @endif value="{{$category->id}}">{{ $category->title }}</option>
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
										<option @if(!empty($blogTags) && in_array($tag->id, $blogTags)) selected="selected" @endif value="{{$tag->id}}">{{ $tag->title }}</option>
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
											<input name="status" class="form-check-input" id="{{ $status }}" value="{{ $key }}" type="radio" @if($blog->status == $key)checked="" @endif> {{ $status }}
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