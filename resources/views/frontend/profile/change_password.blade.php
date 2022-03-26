@extends('frontend.main_master')

@section('content')


<div class="body-content">
	<div class="container">
		<div class="row">

			<div class="col-md-2">
				<br>
				<img class="card-img-top" style="border-radius: 100%" src="{{ (!empty($user->profile_photo_path)) ? url($user->profile_photo_path) : url('upload/no_image.jpg') }}" width="100%" height="100%" alt="">
				{{-- <img class="card-img-top" style="border-radius: 50%" src="{{ asset($user->profile_photo_path) }}" width="100%" height="100%" alt=""> --}}
				<br>
				<br>
				<ul class="list-group list-group-flush">
					<a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
					<a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
					<a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
					<a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
					{{-- <a href="#" id="logout" class="btn btn-danger btn-sm btn-block">Logout</a> --}}
					{{-- <form id="logoutForm" method="POST" action="{{ route('logout') }}">
						@csrf
					</form> --}}
				</ul>
			</div> {{-- end col-md-2 --}}

			<div class="col-md-2">
			</div> {{-- end col-md-2 --}}

			<div class="col-md-6">

				<div class="card">
					<h3 class="text-center"><span class="text-danger">Change Password</h3>
				</div>

				<br>
				<div class="card-body">
					<form method="POST" action="{{ route('user.password.update') }}">
						@csrf

						<div class="form-group">
						    <label class="info-title" for="current_password">Current Password <span></span></label>
						    <input type="password" id="current_password" name="oldpassword" class="form-control"  >
						    @error('oldpassword')
						    	<span class="invalid-feedback" role="alert">
						    		<strong class="text-danger">{{ $message }}</strong>
						    	</span>
						    @enderror 
						</div>
						<div class="form-group">
						    <label class="info-title" for="password">New Password <span></span></label>
						    <input type="password" id="password" name="password" class="form-control" > </div>
						    @error('password')
						    	<span class="invalid-feedback" role="alert">
						    		<strong class="text-danger">{{ $message }}</strong>
						    	</span>
						    @enderror
						</div>
						<div class="form-group">
						    <label class="info-title" for="password_confirmation">Confirm Password <span></span></label>
						    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
						    @error('password_confirmation')
						    	<span class="invalid-feedback" role="alert">
						    		<strong class="text-danger">{{ $message }}</strong>
						    	</span>
						    @enderror
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn btn-danger" value="Update">
						</div>
					</form>

					{{-- @php
						dd($errors)
					@endphp --}}

				</div>

			</div> {{-- end col-md-6 --}}

			<div class="col-md-2">
			</div> {{-- end col-md-2 --}}

		</div>
	</div>
</div>



@endsection

{{-- @section('user-js')
	<script>
		$('#logout').click(function(event){
			event.preventDefault();
			$('#logoutForm').submit();
		});
	</script>
@endsection --}}