@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-rose card-header-icon">
					<div class="card-icon">
						<i class="material-icons">filter_none</i>
					</div>
					<h4 class="card-title">{{ __('Blogs') }}</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 text-right">
	                      <a href="{{ route('blog.new') }}" class="btn btn-sm btn-rose">Add Blog</a>
	                    </div>
					</div>
					<div class="table-responsive">
						@if (!empty($blogs))
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>title</th>
									<th>slug</th>
									<th>Author</th>
									<th>Categories</th>
									<th>Tags</th>
									<th>Created At</th>
									<th>Status</th>
									<th class="text-right desktop sorting_disabled">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($blogs as $blog)
								<tr>
									<td>{{$blog->id}}</td>
									<td>{{$blog->title}}</td>
									<td>{{$blog->slug}}</td>
									<td>{{$blog->author->name}}</td>
									<td>@foreach($blog->categories as $key => $cat) 
										<span>
											{{($key > 0 ? " , " : "")}}
											{{$cat->title}}
										</span>
									@endforeach</td>
									<td>@foreach($blog->tags as $key => $tag) 
										<span>
											{{($key > 0 ? " , " : "")}}
											{{$tag->title}}
										</span>
									@endforeach</td>
									<td>{{$blog->created_at}}</td>
									<td>
										{{ config('app.blog_status')[$blog->status] }}
									</td>
									<td class="td-actions text-right">
										@if( Auth::user()->can_edit_blogs() || Auth::user()->id == $blog->author->id)
										<form id="delete-form" method="POST" action="{{route('blog.delete', ['id' => $blog->id])}}">
											
											<a rel="tooltip" class="btn btn-success btn-link" href="/dashboard/blogs/edit/{{$blog->id}}" data-original-title="" title="">
												<i class="material-icons">edit</i>
												<div class="ripple-container"></div>
											</a>
											{{ csrf_field() }}
											{{ method_field('DELETE') }}

											
											<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('Are you sure you want to delete this blog?') ? this.parentElement.submit() : ''">
												<i class="material-icons">close</i>
												<div class="ripple-container"></div>
											</button>
										</form>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
