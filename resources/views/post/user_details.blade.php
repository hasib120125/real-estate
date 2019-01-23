@extends('layouts.master')

<?php
// Phone
$phone = TextToImage::make($users->phone, IMAGETYPE_PNG, ['backgroundColor' => '#2ECC71', 'color' => '#FFFFFF']);
?>

@section('content')
	{!! csrf_field() !!}
	<input type="hidden" id="post_id" value="">
	<div class="main-container" style="padding: 0;">

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
		<div class="container" style="background-color: #fff;">
			<div class="row">
			<div class="col-sm-8">
			  <div class="col-sm-12 padding_0">
				<div class="profil-banner">
					<div class="banner-pannerl" style="padding: 0;">
						<div class="banner-img">
							<div class="banner-detail" style="background: url('{{asset($users->profile_banner)}}');background-repeat: no-repeat;background-position: center;background-size: cover;">
								<div class="seller-pic">
									<div class="pic-postion">
										<div class="pic-setup">
											<!-- <img src="{{asset($users->avatar)}}" alt="seller"> -->
											<img src="{{asset('public/images/sellers/omr-sani.jpg')}}">
										</div>
										
									</div>

									<div class="user-name">
									@if($users)
										<h3><!-- <span style="font-size: 20px; font-weight: 600;margin-right: 15px; color: #fff;">{{$users->name}}</span> -->
											<span style="font-size: 24px; font-weight: 600;margin-right: 15px; color: #fff;">Md Omar Sani</span>
										</h3>
										 <!--  <p>{{$users->about}}</p> -->
										   <p style="font-size: 18px; color:#fff;">(Entrepreneur)</p>	 

									@endif
									
								    </div>	
								</div>
							</div>
							
					       </div>
						</div>
					</div>	
						
			</div>
			<div class="col-sm-12">
						<div class="profile-info">
						<ul class="nav nav-pills profile-navbar" style="padding-left: 230px;">
					    <!-- <li class=""><a data-toggle="pill" href="#home"></a></li>
					    <li><a data-toggle="pill" href="#menu1"></a></li> -->
					    <li class=""><a data-toggle="pill" href="#home">About</a></li>
					    <li><a data-toggle="pill" href="#menu1">Friends 80 Mutural</a></li>

					  </ul>	
					</div>	
			</div>
			<div class="col-sm-12 add-property">
					<div class="our-propert"><h1>Our Properties</h1></div>
					<div class="more-add-box">
								<div class="col-sm-12 padding_0">
									<div class="col-sm-6 col-xs-8 padding_0">
										<div class="property-land">
											<div class="propery-img">
												<h1>Premium</h1>
												<img style="width: 100%;" src="{{asset('public/images/home-4.jpg')}}" alt="home">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="property-detail">
											<div style="margin-bottom: 15px;">
											<p class="discrpt"><a href="#" style="color:#658AD0;">2000 sqft 3 bed room appartment</a></p>
											<p>Mirpur DOHS Dhaka 1216</p>
											<p class="cont-price">Contact for Price</p>
										  </div>
											<div class="col-xs-6 padding_0">
												<p class="discrpt">3 bed Room</p>
											     <p>2 Birth room</p>
											     <p class="cont-price">No Furnished</p>
											</div>
											<div class="col-xs-6">
												<a href="#">
													<img style="width: 100%; max-height: 140px;" src="{{asset('public/images/logo3.png')}}" alt="company logo">
												</a>
											</div>
										</div>
										<div class="more-details">
											<div class="btn btn-default" style="padding: 5px 12px;"><a href="#">More Details</a></div>
											<ul class="cont-dtnl">
												<li><span><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
												<li><span><i class="fa fa-star-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="more-add-box">
								<div class="col-sm-12 padding_0">
									<div class="col-sm-6 col-xs-8 padding_0">
										<div class="property-land">
											<div class="propery-img">
												<h1>Premium</h1>
												<img style="width: 100%;" src="{{asset('public/images/home-1.jpg')}}" alt="home">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="property-detail">
											<div style="margin-bottom: 15px;">
											<p class="discrpt"><a href="#" style="color:#658AD0;">2000 sqft 3 bed room appartment</a></p>
											<p>Mirpur DOHS Dhaka 1216</p>
											<p class="cont-price">Contact for Price</p>
										  </div>
											<div class="col-xs-6 padding_0">
												<p class="discrpt">3 bed Room</p>
											     <p>2 Birth room</p>
											     <p class="cont-price">No Furnished</p>
											</div>
											<div class="col-xs-6">
												<a href="#">
													<img style="width: 100%; max-height: 140px;" src="{{asset('public/images/logo3.png')}}" alt="company logo">
												</a>
											</div>
										</div>
										<div class="more-details">
											<div class="btn btn-default" style="padding: 5px 12px;"><a href="#">More Details</a></div>
											<ul class="cont-dtnl">
												<li><span><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
												<li><span><i class="fa fa-star-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="more-add-box">
								<div class="col-sm-12 padding_0">
									<div class="col-sm-6 col-xs-8 padding_0">
										<div class="property-land">
											<div class="propery-img">
												<h1>Premium</h1>
												<img style="width: 100%;" src="{{asset('public/images/home-5.jpg')}}" alt="home">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="property-detail">
											<div style="margin-bottom: 15px;">
											<p class="discrpt"><a href="#" style="color:#658AD0;">2000 sqft 3 bed room appartment</a></p>
											<p>Mirpur DOHS Dhaka 1216</p>
											<p class="cont-price">Contact for Price</p>
										  </div>
											<div class="col-xs-6 padding_0">
												<p class="discrpt">3 bed Room</p>
											     <p>2 Birth room</p>
											     <p class="cont-price">No Furnished</p>
											</div>
											<div class="col-xs-6">
												<a href="#">
													<img style="width: 100%; max-height: 140px;" src="{{asset('public/images/logo3.png')}}" alt="company logo">
												</a>
											</div>
										</div>
										<div class="more-details">
											<div class="btn btn-default" style="padding: 5px 12px;"><a href="#">More Details</a></div>
											<ul class="cont-dtnl">
												<li><span><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
												<li><span><i class="fa fa-star-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="more-add-box">
								<div class="col-sm-12 padding_0">
									<div class="col-sm-6 col-xs-8 padding_0">
										<div class="property-land">
											<div class="propery-img">
												<h1>Premium</h1>
												<img style="width: 100%;" src="{{asset('public/images/blog-8.jpg')}}" alt="home">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="property-detail">
											<div style="margin-bottom: 15px;">
											<p class="discrpt"><a href="#" style="color:#658AD0;">2000 sqft 3 bed room appartment</a></p>
											<p>Mirpur DOHS Dhaka 1216</p>
											<p class="cont-price">Contact for Price</p>
										  </div>
											<div class="col-xs-6 padding_0">
												<p class="discrpt">3 bed Room</p>
											     <p>2 Birth room</p>
											     <p class="cont-price">No Furnished</p>
											</div>
											<div class="col-xs-6">
												<a href="#">
													<img style="width: 100%; max-height: 140px;" src="{{asset('public/images/logo3.png')}}" alt="company logo">
												</a>
											</div>
										</div>
										<div class="more-details">
											<div class="btn btn-default" style="padding: 5px 12px;"><a href="#">More Details</a></div>
											<ul class="cont-dtnl">
												<li><span><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
												<li><span><i class="fa fa-star-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="more-add-box">
								<div class="col-sm-12 padding_0">
									<div class="col-sm-6 col-xs-8 padding_0">
										<div class="property-land">
											<div class="propery-img">
												<h1>Premium</h1>
												<img style="width: 100%;" src="{{asset('public/images/home-7.jpg')}}" alt="home">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="property-detail">
											<div style="margin-bottom: 15px;">
											<p class="discrpt"><a href="#" style="color:#658AD0;">2000 sqft 3 bed room appartment</a></p>
											<p>Mirpur DOHS Dhaka 1216</p>
											<p class="cont-price">Contact for Price</p>
										  </div>
											<div class="col-xs-6 padding_0">
												<p class="discrpt">3 bed Room</p>
											     <p>2 Birth room</p>
											     <p class="cont-price">No Furnished</p>
											</div>
											<div class="col-xs-6">
												<a href="#">
													<img style="width: 100%; max-height: 140px;" src="{{asset('public/images/logo3.png')}}" alt="company logo">
												</a>
											</div>
										</div>
										<div class="more-details">
											<div class="btn btn-default" style="padding: 5px 12px;"><a href="#">More Details</a></div>
											<ul class="cont-dtnl">
												<li><span><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
												<li><span><i class="fa fa-star-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="more-add-box">
								<div class="col-sm-12 padding_0">
									<div class="col-sm-6 col-xs-8 padding_0">
										<div class="property-land">
											<div class="propery-img">
												<h1>Premium</h1>
												<img style="width: 100%;" src="{{asset('public/images/home-9.jpg')}}" alt="home">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="property-detail">
											<div style="margin-bottom: 15px;">
											<p class="discrpt"><a href="#" style="color:#658AD0;">2000 sqft 3 bed room appartment</a></p>
											<p>Mirpur DOHS Dhaka 1216</p>
											<p class="cont-price">Contact for Price</p>
										  </div>
											<div class="col-xs-6 padding_0">
												<p class="discrpt">3 bed Room</p>
											     <p>2 Birth room</p>
											     <p class="cont-price">No Furnished</p>
											</div>
											<div class="col-xs-6">
												<a href="#">
													<img style="width: 100%; max-height: 140px;" src="{{asset('public/images/logo3.png')}}" alt="company logo">
												</a>
											</div>
										</div>
										<div class="more-details">
											<div class="btn btn-default" style="padding: 5px 12px;"><a href="#">More Details</a></div>
											<ul class="cont-dtnl">
												<li><span><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
												<li><span><i class="fa fa-star-o" aria-hidden="true" style="font-size: 20px; padding: 3px;"></i></span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
					@if($user_posts)
					@foreach($user_posts->allUserPosts as $single_upost)
							<div class="more-add-box">
								<div class="col-sm-12 padding_0">
									<div class="col-sm-6 col-xs-8 padding_0">
										<div class="property-land">
											<div class="propery-img">
												<img style="width: 100%;" src="{{asset('public/images/home-4.jpg')}}" alt="home">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="property-detail">
											<a href="{{URL::to($single_upost->title,$single_upost->id.'.html')}}">{{ $single_upost->title}}</a>
											<p>{{$single_upost->price}}</p>
											<p>{{$single_upost->address}}</p>
											
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@else
					<div class="more-add-box">
						<div class="col-sm-12 padding_0">
							<h3>No result Found</h3>
						</div>
					</div>
					@endif
				
			</div>
		</div>
		<div class="col-sm-4 page-sidebar-right padding_0">
					 <aside style="background: #66A5CE; padding: 20px 15px;">
						<div class="panel sidebar-panel panel-contact-seller" style="background: #66A5CE; border:0 none;">
						<!-- 	<div class="panel-heading">{{ t('Contact advertiser') }}</div> -->
						<h2 style="">Contact Author</h2>
						<div class="adv-logo">
								<!-- <img style="width: 100%;" src="{{ asset($users->company_logo)}}" alt="partner"> -->
								<img style="width: 100%;" src="{{asset('public/images/logo3.png')}}" alt="company logo">
						</div>
						</div>
						<h4 style="text-align: center;color: #fff;">P-Bazar Properties Limited</h4>
						<!-- <h4>{{$users->company_name}}</h4> -->
						<div class="cont-det">
								<div class="lft-dtl">Name</div>
								<!-- <div class="rlt-detl">{{$users->name}}</div> -->
								<div class="rlt-detl">Md Omar Sani</div>
								<div class="lft-dtl">Contact</div>
								<!-- <div class="rlt-detl">{{$users->phone}}</div> -->
								<div class="rlt-detl">017258932499</div>
								<div class="lft-dtl">Email</div>
								<!-- <div class="rlt-detl">{{$users->email}}</div> -->
								<div class="rlt-detl">contactinfo@gmail.com</div>
								<div style="clear: both;">
							<div class="msg-form">
								<form>
										<h2 style="color: #fff; line-height: 40px;">Message</h2>
									<textarea name="msg" class="msg">
										
									</textarea>
								</form>
								</div>
								<form>
										<h2>Discuss with seller</h2>
									<textarea name="msg" class="msg">
										
									</textarea>
								</form>
								</div>
							</div>

							<div class="panel-content user-info" style="background: #66A5CE;">
								<div class="panel-body text-center">
									<div class="seller-info">
									
										
									</div>
								
								</div>
							</div>			
						<!-- <div class="panel sidebar-panel">
							<div class="panel-content">
								<div class="panel-body text-left">
									
                                    
								</div>
							</div>
						</div> -->
					</aside>
					<div class="properti-list">
						 <button class="btn btn-primary btn-lg ner">Featured Properties</button>
						@if($random_posts)
						@if(count($random_posts)>0)
						@foreach($random_posts as $random_post)
						 <div class="proprty-dt">
						 		<div class="property-img">
						 			<h1>SALE</h1>
						 			<img src="{{asset('public/images/home-4.jpg')}}">
						 		</div>
						 		<div class="prot-cont">
						 				<h4>{{$random_post->title}}</h4>
						 				<h5>Uttra Dhaka</h5>
						 				<p>Avilavel from december</p>
						 				<h4>BDT 350000</h4>
						 		</div>
						 </div>
						@endforeach
						@endif
						@endif
						 <div class="proprty-dt">

						 		<div class="property-img">
						 			<h1>SALE</h1>
						 				<img src="{{asset('public/images/home-4.jpg')}}">
						 		</div>
						 		<div class="prot-cont">
						 				<h4>Uttra Model Town</h4>
						 				<h5>Uttra Dhaka</h5>
						 				<p>Avilavel from december</p>
						 				<h4>BDT 350000</h4>
						 		</div>
						 </div>
						 <div class="proprty-dt">

						 		<div class="property-img">
						 			<h1>SALE</h1>
						 				<img src="{{asset('public/images/home-4.jpg')}}">
						 		</div>
						 		<div class="prot-cont">
						 				<h4>Uttra Model Town</h4>
						 				<h5>Uttra Dhaka</h5>
						 				<p>Avilavel from december</p>
						 				<h4>BDT 350000</h4>
						 		</div>
						 </div>
						 <div class="proprty-dt">

						 		<div class="property-img">
						 			<h1>SALE</h1>
						 				<img src="{{asset('public/images/home-4.jpg')}}">
						 		</div>
						 		<div class="prot-cont">
						 				<h4>Uttra Model Town</h4>
						 				<h5>Uttra Dhaka</h5>
						 				<p>Avilavel from december</p>
						 				<h4>BDT 350000</h4>
						 		</div>
						 </div>
					</div>
				</div>
	</div>
			<div style="margin-top: 30px;"></div>
			
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
  }(document, 'script', 'facebook-jssdk'));
	var modalDefaultAdminCode = 0;
</script>
<script src="{{ asset('public/assets/js/app/load.cities.js') }}"></script>
@endsection