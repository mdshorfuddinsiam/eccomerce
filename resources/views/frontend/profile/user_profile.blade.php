@extends('frontend.main_master')

@section('content')

	@php
		// dd($user)
		// dd($user->profile_photo_path);
	@endphp

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
					<h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{  Auth::user()->name }}</strong> Update Your Profile</h3>
				</div>

				<br>
				<div class="card-body">
					<form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group">
						    <label class="info-title" for="name">Name <span></span></label>
						    <input type="name" id="name" name="name" class="form-control" value="{{ $user->name }}">
						    @error('name')
						    	<span class="invalid-feedback" role="alert">
						    		<strong class="text-danger">{{ $message }}</strong>
						    	</span>
						    @enderror    
						</div>
						<div class="form-group">
						    <label class="info-title" for="email">Email <span></span></label>
						    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
						    @error('email')
						    	<span class="invalid-feedback" role="alert">
						    		<strong class="text-danger">{{ $message }}</strong>
						    	</span>
						    @enderror   
						</div>
						<div class="form-group">
						    <label class="info-title" for="phone">Phone <span></span></label>
						    <input type="phone" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
						    @error('phone')
						    	<span class="invalid-feedback" role="alert">
						    		<strong class="text-danger">{{ $message }}</strong>
						    	</span>
						    @enderror   
						</div>
						<div class="form-group">
						    <label class="info-title" for="profile_photo_path">Image <span></span></label>
						    <input type="file" id="profile_photo_path" name="profile_photo_path" class="form-control">
						    @error('profile_photo_path')
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