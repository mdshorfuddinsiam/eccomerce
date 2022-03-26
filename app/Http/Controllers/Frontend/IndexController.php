<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    
	public function index(){
	    return view('frontend.index');
	}

	public function userLogout(){
		Auth::logout();
		return redirect()->route('login');
	}

	public function userProfile(){
		// $id = Auth::user()->id;
		// $user = User::find($id);
		// // $user = Auth::user();
		// // dd($user);

		// return view('frontend.profile.user_profile', compact('user'));
		return view('frontend.profile.user_profile');
	}

	public function userProfileUpdate(Request $request){
		// dd($request->all());
		// return $request->all();

		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:users',
			'phone' => 'required|string|max:15',
			'profile_photo_path' => 'mimes:jpeg,jpg,png,gif|max:2048' // max 10000kb
			// 'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
		]);

		$updateData = Auth::user();
    	User::userProfileUpdate($request, $updateData);

    	$notification = array(
            'message' => 'User Profile Successfully Updated!!!',
            'alert-type' => 'success'
        );
    	return redirect()->route('user.profile')->with($notification);
	}


	public function userChangePassword(){
		return view('frontend.profile.change_password');
	}

	public function userPasswordUpdate(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'oldpassword' => 'required|string',
			'password'    => 'required|string|min:6|different:oldpassword',
			'password_confirmation' => 'required|same:password|string|min:6|',
		]);

		return User::userPasswordUpdate($request);
	}

}
