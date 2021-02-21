@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="card">
			<div class="card-header card-header-rose card-header-icon">
				<div class="card-icon">
					<i class="material-icons">tag</i>
				</div>
				<h4 class="card-title">{{ __('Tags') }}</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12 text-right">
						<a href="{{ route('tag.new') }}" class="btn btn-sm btn-rose">Add Tag</a>
					</div>
				</div>
				<div class="table table-striped table-no-bordered table-hover datatable-primary dataTable no-footer dtr-inline">
					@if (!empty($tags))
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>title</th>
								<th>slug</th>
								<th>Created At</th>
								<th class="text-right desktop sorting_disabled">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($tags as $tag)
							<tr>
								<td>{{$tag->id}}</td>
								<td>{{$tag->title}}</td>
								<td>{{$tag->slug}}</td>
								<td>{{$tag->created_at}}</td>
								<td class="td-actions text-right">
									<form action="{{route('tag.delete', ['id' => $tag->id])}}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<a rel="tooltip" class="btn btn-success btn-link" href="/dashboard/tags/edit/{{$tag->id}}" data-original-title="" title="">
											<i class="material-icons">edit</i>
											<div class="ripple-container"></div>
										</a>

										<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('Are you sure you want to delete this tag?') ? this.parentElement.submit() : ''">
											<i class="material-icons">close</i>
											<div class="ripple-container"></div>
										</button>
									</form>
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
@endsection
