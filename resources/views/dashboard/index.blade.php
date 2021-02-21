@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="material-icons">info</i>
					</div>
				</div>

				<div class="card-body">
					<h4 class="card-title">running on server {{ gethostname() }}</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card card-stats">
				<div class="card-header card-header-rose card-header-icon">
					<div class="card-icon">
						<i class="material-icons">filter_none</i>
					</div>
					<p class="card-category">Blogs</p>
					<a href="{{route('dashboard.users')}}" ><h3 class="card-title">{{ $stats['blogs_count']>1 ? $stats['blogs_count'] . " blogs" : $stats['blogs_count']. " blog" }}</h3></a>
				</div>
				@if( $stats['last_blog_updated'] )
				<div class="card-footer">
					<div class="stats">
						<i class="material-icons">date_range</i> {{ $stats['last_blog_updated'] }}
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header card-header-success card-header-icon">
					<div class="card-icon">
						<i class="material-icons">equalizer</i>
					</div>
					<p class="card-category">Activities</p>
				</div>
				<div class="card-body">
					<h4 class="card-title">{{__('Recently Published')}}</h4>
					@if($stats['last_blogs'])
						@foreach($stats['last_blogs'] as $blog)
							<div class="card-category">
								<span><i class="material-icons mr-2">access_time</i>{{ $blog['blog_updated'] }}</span>
								<span class="ml-4">
									<stong><a href="{{ route('show.blog', ['id' => $blog['blog_id'], 'slug' => $blog['blog_slug']]) }}">{{ $blog['blog_title'] }}</a></stong>
								</span>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>

</div>
@endsection