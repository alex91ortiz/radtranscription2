@extends('layout_login')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Ingreso de usuario</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="mdi mdi-medical-bag"></i></span>
				</div>
			</div>
			<div class="card-body">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form  role="form" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="mdi mdi-account"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="correo electronico"  name="email" value="{{ old('email') }}">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="mdi mdi-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
				
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Bienvenidos al inicio se sesión de RBD!
				</div>
				
			</div>
		</div>
	</div>
	
</div>
@endsection
