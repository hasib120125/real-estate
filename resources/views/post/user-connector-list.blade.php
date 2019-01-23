@extends('layouts.master')

<?php
// Phone
$phone = TextToImage::make('01515452854', IMAGETYPE_PNG, ['backgroundColor' => '#2ECC71', 'color' => '#FFFFFF']);
?>

@section('content')
	{!! csrf_field() !!}
	<input type="hidden" id="post_id" value="">
	<div class="main-container">

		@if (Session::has('flash_notification'))
			<div class="container" style="margin-bottom: -10px; margin-top: -10px;">
				<div class="row">
					<div class="col-lg-12">
						@include('flash::message')
					</div>
				</div>
			</div>
			<?php Session::forget('flash_notification.message'); ?>
		@endif

		@include('layouts.inc.advertising.top')

		<div class="container">
			<ol class="breadcrumb pull-left">
				<li><a href="{{ lurl('/') }}"><i class="icon-home fa"></i></a></li>
				<li class="active">Username</li>
			</ol>
			<div class="pull-right backtolist">
                <a href="{{ URL::previous() }}">
                    <i class="fa fa-angle-double-left"></i> {{ t('Back to Results') }}
                </a>
            </div>
		</div>
		<div class="container">
			<div class="row">
				<div class="profil-banner">
					<div class="banner-pannerl">
						<div class="banner-img">
							<div class="banner-detail">
								<div class="seller-pic">
									<div class="pic-postion">
										<div class="pic-setup">
											<img src="{{asset('public/images/sellers/ZITnurDx.png')}}" alt="seller">
										</div>
										
									</div>
								</div>
							</div>
					</div>
								</div>
						</div>			
			</div>
			<div class="row">
					<div class="col-sm-3 col-xs-6 ">
						<h3><span style="font-size: 20px; font-weight: 600;margin-right: 15px;">Name:</span></h3>
							  <p>Chief Executive Officer</p>
							  <p>Technobari Limited</p>
							
			    	</div>
			    	<div class="col-sm-3 col-xs-6 ">
						
							
			    	</div>
			    	<div class="col-sm-3 col-xs-6 ">
						
							
			    	</div>
			    	<div class="col-sm-3 col-xs-6 ">
						
							
			    	</div>
			</div>
			<div class="row" style="margin-top: 30px;">
					<div class="col-sm-3 col-xs-12 padding_0" style="border:1px solid #ddd; border-right: 0;border-bottom: 0;">
						<p class="fnd-total">You have total friend <span>500</span></p>
					</div>
					<div class=" col-sm-4 col-xs-9 padding_0">
					   <input class="sch-inpt" type="text" name="search">
					</div>
					<div class="col-sm-5 col-xs-3 padding_0">
						<button class="btn btn-primary s-btn">Search</button>
					</div>		
			</div>	
			<div class="row" style="border-bottom: 1px solid #ddd; border-right:1px solid #ddd;">
				<div class="col-sm-3 col-xs-6 contector-list">
						<div class="user-list">
								<img class="img-circle" src="{{asset('public/images/friend-list/friend.jpg')}}">
								<h3>Mr Shofiqur Rahaman</h3>
								<p>Founder Member</p>
								<p>Technobari Limited</p>
								<p>Mutural Friend <span>50</span></p>
						</div>
				</div>
				<div class="col-sm-3 col-xs-6 contector-list">
							<div class="user-list">
								<img class="img-circle" src="{{asset('public/images/friend-list/friend.jpg')}}">
								<h3>Mr Shofiqur Rahaman</h3>
								<p>Founder Member</p>
								<p>Technobari Limited</p>
								<p>Mutural Friend <span>50</span></p>
						</div>
				</div>
				<div class="col-sm-3 col-xs-6 contector-list">
							<div class="user-list">
								<img class="img-circle" src="{{asset('public/images/friend-list/friend.jpg')}}">
								<h3>Mr Shofiqur Rahaman</h3>
								<p>Founder Member</p>
								<p>Technobari Limited</p>
								<p>Mutural Friend <span>50</span></p>
						</div>
				</div>
				<div class="col-sm-3 col-xs-6 contector-list">
							<div class="user-list">
								<img class="img-circle" src="{{asset('public/images/friend-list/friend.jpg')}}">
								<h3>Mr Shofiqur Rahaman</h3>
								<p>Founder Member</p>
								<p>Technobari Limited</p>
								<p>Mutural Friend <span>50</span></p>
						</div>
				</div>

			</div>
			
			@include('home.inc.featured')
			@include('layouts.inc.advertising.bottom')

		</div>
	</div>
@endsection



@section('after_styles')
	<!-- bxSlider CSS file -->
	<link href="{{ url('public/assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet"/>
@endsection

@section('after_scripts')
    @if (config('services.googlemaps.key'))
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemaps.key') }}" type="text/javascript"></script>
    @endif

	<!-- bxSlider Javascript file -->
	<script src="{{ url('public/assets/plugins/bxslider/jquery.bxslider.min.js') }}"></script>
    
	<script>
		/* Favorites Translation */
        var lang = {
            labelSavePostSave: "{!! t('Save ad') !!}",
            labelSavePostRemove: "{!! t('Remove favorite') !!}",
            loginToSavePost: "{!! t('Please log in to save the Ads.') !!}",
            loginToSaveSearch: "{!! t('Please log in to save your search.') !!}",
            confirmationSavePost: "{!! t('Post saved in favorites successfully !') !!}",
            confirmationRemoveSavePost: "{!! t('Post deleted from favorites successfully !') !!}",
            confirmationSaveSearch: "{!! t('Search saved successfully !') !!}",
            confirmationRemoveSaveSearch: "{!! t('Search deleted successfully !') !!}"
        };
		
		$(document).ready(function () {
			/* Slider */
			var $mainImgSlider = $('.bxslider').bxSlider({
				speed: 1000,
				pagerCustom: '#bx-pager',
				adaptiveHeight: true
			});
			
			/* Initiates responsive slide */
			var settings = function () {
				var mobileSettings = {
					slideWidth: 80,
					minSlides: 2,
					maxSlides: 5,
					slideMargin: 5,
					adaptiveHeight: true,
					pager: false
				};
				var pcSettings = {
					slideWidth: 100,
					minSlides: 3,
					maxSlides: 6,
					pager: false,
					slideMargin: 10,
					adaptiveHeight: true
				};
				return ($(window).width() < 768) ? mobileSettings : pcSettings;
			};
			
			var thumbSlider;
			
			function tourLandingScript() {
				thumbSlider.reloadSlider(settings());
			}
			
			thumbSlider = $('.product-view-thumb').bxSlider(settings());
			$(window).resize(tourLandingScript);
			
            
			/* Keep the current tab active with Twitter Bootstrap after a page reload */
            /* For bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line */
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                /* save the latest tab; use cookies if you like 'em better: */
                localStorage.setItem('lastTab', $(this).attr('href'));
            });
            /* Go to the latest tab, if it exists: */
            var lastTab = localStorage.getItem('lastTab');
            if (lastTab) {
                $('[href="' + lastTab + '"]').tab('show');
            }
		})
	</script>
	<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
@endsection