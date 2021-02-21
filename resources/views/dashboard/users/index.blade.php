@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-rose card-header-icon">
					<div class="card-icon">
						<i class="material-icons">group</i>
					</div>
					<h4 class="card-title">{{ __('Users') }}</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 text-right">
							@if(in_array(Auth::user()->role, [1,2]))
							<a href="{{ route('user.new') }}" class="btn btn-sm btn-rose">Add user</a>
							@endif
						</div>
					</div>
					{{-- <h2 class="sub-header">Users list</h2> --}}
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Created At</th>
									@if(in_array(Auth::user()->role, [1,2]))
									<th>Role</th>
									<th class="text-right desktop sorting_disabled">Actions</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
								<tr>
									<td>{{$user->id}}</td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->created_at}}</td>
									@if(in_array(Auth::user()->role, [1,2]))
									<td>
										- {{ config('app.roles')[$user->role] }} -
									</td>
									@if( $user->role != 1 || ( $user->role == 1 && Auth::user()->role == 1 ) ) 	
									<td class="td-actions text-right">
										<form id="delete-form" method="POST" action="{{route('user.delete', ['id' => $user->id])}}">
											
											<a rel="tooltip" class="btn btn-success btn-link" href="/dashboard/users/edit/{{$user->id}}" data-original-title="" title="">
												<i class="material-icons">edit</i>
												<div class="ripple-container"></div>
											</a>
											{{ csrf_field() }}
											{{ method_field('DELETE') }}

											
											<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('Are you sure you want to delete this user?') ? this.parentElement.submit() : ''">
												<i class="material-icons">close</i>
												<div class="ripple-container"></div>
											</button>
										</form>
									</td>
									@endif	
									@endif

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
