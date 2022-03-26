@extends('frontend.main_master')

@section('content')


<div class="body-content">
	<div class="container">
		<div class="row">

			<div class="col-md-2">
				<br>
				<img class="card-img-top" style="border-radius: 100%" src="{{ (!empty($user->profile_photo_path)) ? url($user->profile_photo_path) : url('upload/no_image.jpg') }}" width="100%" height="100%" alt="">
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
					<h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{  Auth::user()->name }}</strong> Welcome To Easy Online Shop</h3>
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