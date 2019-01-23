
@extends('layouts.master')

@section('search')
	@parent
	@include('home.inc.search')
	@include('home.inc.main-content')

@endsection

@section('content')
	<div class="main-container" id="homepage">
		<div class="container">
			
			<div class="row">
			@if (Session::has('flash_notification'))
				<div class="container" style="margin-bottom: -10px; margin-top: -10px;">
					<div class="row">
						<div class="col-lg-12">
							@include('flash::message')
						</div>
					</div>
				</div>
			@endif
			</div>
			
			@if (isset($sections) and $sections->count() > 0)
				@foreach($sections as $section)
					@if (view()->exists($section->view))
						<!-- @-include($section->view) -->
					@endif
				@endforeach
			@endif

		</div>
	</div>
@endsection

@section('after_scripts')
<script type="text/javascript">
	var modalDefaultAdminCode = 0;
	$(document).ready(function(){
		$('#homepage').hide();
	});
</script>
<script src="{{ asset('public/assets/js/app/load.cities.js') }}"></script>
@endsection
