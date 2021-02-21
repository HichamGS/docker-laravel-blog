@extends('layouts.app')

@section('content')
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home')}}">Home</a></li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-lg-8 col-md-12 mb-4" id="tutorialPageContainer">
			<!-- Featured image -->
			<img width="700" height="367" src="{{ $blog->image->blog_image_path }}" class="img-fluid z-depth-1-half mb-4 wp-post-image" alt=""  sizes="(max-width: 700px) 100vw, 700px">
			<!--Section: Post data-->
			<section>
				<div class="row">
					<div class="col-md-6 pt-2">

						<p class="text-md-left text-center"><strong>Author:</strong>
							{{$blog->author->name}}
						</p>
					</div>
				</div>
			</section>
			<hr>
			<section>
				<h2 class="my-4 h4 font-weight-bold text-center">{{$blog->title}}</h2>
				<p class="card-text">{!! $blog->content !!}</p>
			</section>

		</div>
	</div>
</div>
@endsection