@extends('layouts.app')

@section('content')
<div class="container">
	<section class="text-center">

		<div class="row mb-4 wow fadeIn">
			@if($blogs)
			@foreach($blogs as $blog)
			<div class="col-md-6 mb-4">

				<!--Card-->
				<div class="card">

					<!--Card image-->
					<div class="view overlay">
						<img src="{{$blog->image->blog_image_path }}" class="card-img-top" alt="">
						<a href="{{ route('show.blog', ['id' => $blog->id, 'slug' => $blog->slug])  }}">
							<div class="mask rgba-white-slight waves-effect waves-light"></div>
						</a>
					</div>

					<!--Card content-->
					<div class="card-body">
						<!--Title-->
						<h4 class="card-title">{{ $blog->title }}</h4>
						<!--Text-->
						<p class="card-text">{!! $blog->excerpt !!} </p>
						<a href="{{ route('show.blog', ['id' => $blog->id, 'slug' => $blog->slug])  }}" class="btn btn-primary btn-md waves-effect waves-light">Read More
						</a>
					</div>

				</div>
				<!--/.Card-->

			</div>
			@endforeach
			@endif
		</div>
	</section>
</div>
@endsection