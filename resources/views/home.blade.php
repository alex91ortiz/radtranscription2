@extends('app')

@section('content')

	<div class="panel panel-default">
	

		<div class="panel-body">
			<div class="row">
				<div class="col-md-12 col-md-offset-3">
				    @if(Auth::user()->companie)
					<img src="{{ 'data:image/png;base64,'.Auth::user()->companie->logo }}" width="100%" height="400" class="img-responsive img-rounded ">
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection
