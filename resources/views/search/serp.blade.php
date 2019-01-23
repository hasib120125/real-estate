<?php
	$fullUrl = url(\Illuminate\Support\Facades\Request::getRequestUri());
	$tmpExplode = explode('?', $fullUrl);
	$fullUrlNoParams = current($tmpExplode);
?>
@extends('layouts.master')
@section('search')
	@parent
	@include('home.inc.search')
@endsection
@section('content')
<div class="container" style="max-width: 1170px;">
		<div class="row" style="padding:0; margin:0;">
					<div class="pager">
						<h2 style="font-size:20px; margin:10px 0; padding-bottom:10px;">
						29 Results found for Property For Sale in Dhaka</h2>
						<ul class="pagination" style="margin: 5px 0;">
						<li class="active"><span>1</span></li>
						<li class="individual-page"><a href="#">2</a></li>
						<li class="individual-page"><a href="#">3</a></li>
						<li class="individual-page"><a href="#">4</a></li>
						<li class="individual-page"><a href="#">5</a></li>
						<li class="next-page"><a href="#">Next</a></li>
						<li class="last-page"><a href="#">Last</a></li>
						<!-- <div class="pagination-bar text-center">
						{!! $posts->appends(Request::except('page'))->render() !!}
					   </div> -->
					</ul>
					</div>
			</div>
			<div class="row" style="background: #fff; margin:0; padding:0;">
				<div class="col-sm-2 hidden-xs">

						<!-- <div style="display: block; text-align: center;">
							<button class="btn btn-lg btn-primary lnd-btn" >Land</button>
						</div> -->
						<form style="margin-top:30px;">
							<div class="form-group" style="margin-bottom:30px;">
						     <label for="sel1" style="font-size: 15px;">Select Property Type</label>
						      <select class="form-control user-dmn" id="sel1">
						        <option value="">Appartment</option>
						        <option value="">House</option>
						        <option value="">Commercial Properties</option>
						        <option value="">Land</option>
						      </select>
						    </div>
						    <div class="form-group" style="margin-bottom:30px;">
						       <label for="sel1" style="font-size: 15px;">Select Division </label>
						      <select class="form-control user-dmn" id="sel1">
						         <option value="">Dhaka</option>
						        <option value="">Chittagong</option>
						        <option value="">Khulna</option>
						        <option value="">Rajshahi</option>
						      </select>
						    </div>
						    <div class="form-group" style="margin-bottom:30px;">
						      <label for="sel1" style="font-size: 15px;">Select District</label>
						      <select class="form-control user-dmn" id="sel1">
						        <option value="">Dhaka</option>
						        <option value="">Gazipur</option>
						        <option value="">Saver</option>
						        <option value="">Monshigong</option>
						      </select> 
						    </div>
						    <div class="form-group" style="margin-bottom:30px;">
						      <label for="sel1" style="font-size: 15px;">Select Area</label>
						      <select class="form-control user-dmn" id="sel1">
						        <option value="">Dhaka</option>
						        <option value="">Uttara</option>
						        <option value="">Gulshan</option>
						        <option value="">Banani</option>
						      </select>
						    	      
						    </div>
						  </form>
				    <div style="display: block; text-align: center;">
							<button class="btn btn-lg btn-primary lnd-btn" >Premium Members</button>
						</div>
					
					<div class="membership-logo">
						<img src="{{asset('public/images/membership-logo/premium.png')}}">
					</div>
					<div class="membership-logo">
						<img src="{{asset('public/images/membership-logo/premium.png')}}">
					</div>
					<div class="membership-logo">
						<img src="{{asset('public/images/membership-logo/premium.png')}}">
					</div>
				</div>
				<div class="col-sm-7 padding_0" style="max-width: 645px;">
					<div class="block-heading">
						<h4><span class="heading-icon"><i class="fa fa-star" aria-hidden="true"></i>
							<!-- <i class="fa fa-caret-right icon-design" aria-hidden="true"></i> --></span>Top Add</h4>
						<h4 class="pull-right hidden-xs feature">For top ad call <strong>017 3333 2312</strong></h4>
					</div>
					<div class="col-sm-12 padding_0">
							<div id="owl-demo">
          
								  <div class="item"><img src="{{asset('public/images/home-1.jpg')}}" alt="Owl Image">
								  	  <div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								  <div class="item"><img src="{{asset('public/images/home-4.jpg')}}" alt="Owl Image">
								  		<div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								  <div class="item"><img src="{{asset('public/images/home-5.jpg')}}" alt="Owl Image">
								  		<div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								  <div class="item"><img src="{{asset('public/images/home-7.jpg')}}" alt="Owl Image">
								  		<div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								  <div class="item"><img src="{{asset('public/images/home-9.jpg')}}" alt="Owl Image">
								  		<div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								  <div class="item"><img src="{{asset('public/images/beach1.jpg')}}" alt="Owl Image">
								  		<div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								  <div class="item"><img src="{{asset('public/images/fh10.jpg')}}" alt="Owl Image">
								  		<div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								  <div class="item"><img src="{{asset('public/images/blog-8.jpg')}}" alt="Owl Image">
								  		<div class="addres">
								  	  			<div class="space">5.00 Katha</div>
								  	  			<div class="place">
								  	  				<span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
								  	  				<span>Uttara, Dhaka</span>
								  	  			</div>
								  	  </div>
								  </div>
								 
								</div>
					</div>
				<div class="col-sm-12">
						<!-- 	@include('search.inc.breadcrumbs') -->
				</div>
				<!-- Sidebar -->
                @if (config('settings.serp_left_sidebar'))
                    @include('search.inc.sidebar')
                    <?php $contentColSm  = 'col-sm-12'; ?>
                @else
                    <?php $contentColSm = 'col-sm-12'; ?>
                @endif 

				<!-- Content -->
				<div class="{{ $contentColSm }} page-content col-thin-left">
					<div class="category-list">
						<div class="listing-filter hidden-xs" style="padding-top:0; border:0;">
							
							@if ($posts->getCollection()->count() > 0)
								<!-- <div class="pull-right col-xs-2 text-right listing-view-action">
									<span class="list-view"><i class="icon-th"></i></span>
									<span class="compact-view"><i class="icon-th-list"></i></span>
									<span class="grid-view active"><i class="icon-th-large"></i></span>
								</div> -->
							@endif

							
						</div>

						<div class="adds-wrapper">
							<div class="col-sm-12 col-md-12 padding_0">
							@include('search.inc.posts')
							</div>
						</div>

						
					</div>

					

					<div class="post-promo text-center" style="margin-bottom: 30px;">
						<h2> {{ t('Do you get anything for sell ?') }} </h2>
						<h5>{{ t('Sell your products and services online FOR FREE. It\'s easier than you think !') }}</h5>
						<a href="{{ lurl('posts/create') }}" class="btn btn-lg btn-border btn-post btn-danger">{{ t('Start Now!') }}</a>
					</div>

				</div>
			</div>
			<div class="col-sm-3 col-md-3 padding_0">
					<div class="right-side-add">
						<div class="add-img">
						<div class="overlay" style="line-height: 165px;">
							<i class="fa fa-search" aria-hidden="true"></i>
						</div>
						<img style="width: 236px; height: 172px;  float: right;" src="{{asset('public/images/home-5.jpg')}}">
					    </div>
					</div>
					<div class="right-side-add">
						<div class="add-img">
							<div class="overlay" style="line-height: 165px;">
								<i class="fa fa-search" aria-hidden="true"></i>
							</div>
						<img style="width: 236px; height: 172px;  float: right;" src="{{asset('public/images/housing/1.jpg')}}">
					   </div>
					</div>
					<div class="right-side-add">
						<div class="add-img">
							<div class="overlay" style="line-height: 165px;">
								<i class="fa fa-search" aria-hidden="true"></i>
							</div>
						<img style="width: 236px; height: 172px;  float: right;" src="{{asset('public/images/home-7.jpg')}}">
					     </div>
					</div>
					<div class="right-side-add">
						<div class="add-img">
							<div class="overlay" style="line-height: 165px;">
								<i class="fa fa-search" aria-hidden="true"></i>
							</div>
						<img style="width: 236px; height: 172px; float: right;" src="{{asset('public/images/home-9.jpg')}}">
					    </div>
					</div>
					
			</div>
			

				<!-- Advertising -->
				<!-- @include('layouts.inc.advertising.bottom') -->

			</div>
		 </div>
	
@endsection

@section('modal_location')
	@include('layouts.inc.modal.location')
@endsection

@section('after_scripts')
	<script>
		/* Default view (See in /js/script.js) */
		@if ($count->get('all') > 0)
			@if (config('settings.serp_display_mode') == '.grid-view')
				gridView('.grid-view');
        	@elseif (config('settings.serp_display_mode') == '.list-view')
        		listView('.list-view');
        	@elseif (config('settings.serp_display_mode') == '.compact-view')
        		compactView('.compact-view');
        	@else
        		gridView('.grid-view');
        	@endif
		@else
    		listView('.list-view');
		@endif
		/* Save the Search page display mode */
        var searchDisplayMode = readCookie('searchDisplayModeCookie');
        if (!searchDisplayMode) {
            createCookie('searchDisplayModeCookie', '{{ config('settings.serp_display_mode', '.grid-view') }}', 7);
        }
		
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
			$('#postType a').click(function (e) {
				e.preventDefault();
				var goToUrl = $(this).attr('href');
				redirect(goToUrl);
			});
			$('#orderBy').change(function () {
				var goToUrl = $(this).val();
				redirect(goToUrl);
			});
		});
	</script>
	
@endsection
