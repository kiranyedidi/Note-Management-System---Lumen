@extends('layouts.master')

@section('content')

<!-- Sign in page -->
<div class="row main">
	<div class="panel-heading">
     <div class="panel-title text-center">
     		<h1 class="title">User Login</h1>
     		<hr />
     	</div>
  </div>
	<div class="main-login main-center">
		<form class="form-horizontal" method="post" action="{{route('userVerification')}}">
			<div class="form-group">
				<label for="usermail" class="cols-sm-2 control-label">E-mail</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
						<input type="email" class="form-control" name="usermail" id="usermail" placeholder="Enter your E-mail" required="required" />
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="password" class="cols-sm-2 control-label">Password</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
						<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required="required"/>
					</div>
				</div>
			</div>

			<div class="form-group ">
        <button type="submit" name="login" class="btn btn-primary btn-lg btn-block login-button">Sign in</button>
			</div>

			<!-- Displaying invalid credentials error -->
			@if(Session::has('error'))
				<div class="row">
					<div class="col-sm-12">
						<p style="text-align: center" class="alert alert-danger"> {{ Session::get('error')}} </p>
					</div>
				</div>
			@endif

		</form>
	</div>
</div>
@endsection
