@extends('dashboard.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form role="form" method="POST" action="{{ route('user.update',['id' => $user->id]) }}">
				{!! method_field("PATCH") !!}
				{!! csrf_field() !!}
				<div class="card">
					<div class="card-header card-header-rose card-header-icon">
						<div class="card-icon">
							<i class="material-icons">filter_none</i>
						</div>
						<h4 class="card-title">{{ __('Edit User') }}</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-right">
								<a href="{{route('dashboard.users')}}" class="btn btn-sm btn-rose">Back to list<div class="ripple-container"></div></a>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">Password</label>
							<div class="col-md-6">
								<input class="form-control" id="email" type="email"  name="email" value="{{ $user->email }}" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
							<div class="col-md-6">
								<input class="form-control" id="role" type="checkbox"  name="role" @if ($user->role == 1 ) checked=checked @endif>
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
@endsection