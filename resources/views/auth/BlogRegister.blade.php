@extends('layouts.masterBlog')
@section('content')
<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{asset('login_assets')}}/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Register
					</span>
				</div>

				<form class="login100-form validate-form" action="{{asset('register')}}" method="post">
					@csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="name is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" value="{{old('name')}}" placeholder="Enter name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" value="{{old('username')}}" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" value="{{old('email')}}" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" value="{{old('password')}}" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Enter confirm password">
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
		
			
@endsection