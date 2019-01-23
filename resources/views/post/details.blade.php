@extends('layouts.master')

<?php
// Phone
$phone = TextToImage::make($post->phone, IMAGETYPE_PNG, ['backgroundColor' => '#2ECC71', 'color' => '#FFFFFF']);
?>
@section('search')
	@parent
	@include('home.inc.search')
@endsection
@section('content')
	{!! csrf_field() !!}
	<input type="hidden" id="post_id" value="{{ $post->id }}">

	<div class="main-container" style="padding-top: 5px;">

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
			<div class="row" style="background-color: #fff;">
				<div class="col-sm-8 page-content col-thin-right">
					<div class="inner inner-box ads-details-wrapper" style="padding-top: 0;">
						<div class="propert-dtl">
								<h1>2.4 khata Residantal for sale at mirzapur Tangail</h1>
								<div class="col-xs-12 col-sm-12 padding_0">
									<div class="col-xs-6 text-right padding_0">
									    <h2 class="enable-long-words" style="float: left; padding-bottom: 0;">
											<strong>
												<a style="font-size:18px;color:#fff;" href="{{ lurl(slugify($post->title).'/'.$post->id.'.html') }}" title="{{ mb_ucfirst($post->title) }}">
													{{ mb_ucfirst($post->title) }}
				                                </a>
				                            </strong>
											<small class="label label-default adlistingtype">{{ $postType->name }}</small>
											@if ($post->featured==1 and isset($package) and !empty($package))
				                                <i class="icon-ok-circled tooltipHere" style="color: {{ $package->ribbon }};" title="" data-placement="right"
												   data-toggle="tooltip" data-original-title="{{ $package->short_name }}"></i>
				                            @endif
										</h2>
										<span class="info-row" style="color: #fff; border:0; float: left;">
										<span class="date"><i class=" icon-clock"> </i> {{ $post->created_at_ta }} </span> -&nbsp;
										<span class="category">{{ $parentCat->name }}</span> -&nbsp;
										<span class="item-location"><i class="fa fa-map-marker"></i> {{ $post->city->name }} </span> -&nbsp;
										<span class="category"><i class="icon-eye-3"></i> {{ $post->visits }} {{ trans_choice('global.count_views', getPlural($post->visits)) }}</span>
									  </span>
									</div>
										 <div class="col-xs-6 text-right">
										<ul class="add-share">
									  		<?php $shared_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
									  		<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{$shared_link}}" class="faccbook-a"></a></li>
									  		<li class="twitter"><a href="https://twitter.com/home?status={{$shared_link}}" class="twitter-a"></a></li>
									  		<li class="googleplus"><a href="https://plus.google.com/share?url={{$shared_link}}" class="googleplus-a"></a></li>
									  		<li class="lindn"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shared_link}}&title={{$post->title}}&summary={{$post->description}}&source={{$shared_link}}" class="lindn-a"></a></li>
									  	</ul>
									  </div>
								</div> 
						</div>
						<div class="ads-image">
									
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="{{asset('public/images/home-1.jpg')}}">
        </div><!-- End Item -->
 
         <div class="item">
          <img src="{{asset('public/images/home-4.jpg')}}">
        </div><!-- End Item -->
        
        <div class="item">
         <img src="{{asset('public/images/home-5.jpg')}}">
        </div><!-- End Item -->
        
        <div class="item">
          <img src="{{asset('public/images/home-7.jpg')}}">
           <!-- <div class="carousel-caption">
            
          </div> -->
        </div><!-- End Item -->
        <div class="item">
          <img src="{{asset('public/images/home-9.jpg')}}">
        </div><!-- End Item -->
        <div class="item">
          <img src="{{asset('public/images/slide-3.jpg')}}">
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->


		<ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#"> <img style="width:80px; height: 80px;" src="{{asset('public/images/home-1.jpg')}}"></a></li>
          <li data-target="#myCarousel" data-slide-to="1"><a href="#"> <img style="width:80px; height: 80px;" src="{{asset('public/images/home-4.jpg')}}"></a></li>
          <li data-target="#myCarousel" data-slide-to="2"><a href="#"> <img style="width:80px; height: 80px;" src="{{asset('public/images/home-5.jpg')}}"></a></li>
          <li data-target="#myCarousel" data-slide-to="3"><a href="#"> <img style="width:80px; height: 80px;" src="{{asset('public/images/home-7.jpg')}}"></a></li>
          <li data-target="#myCarousel" data-slide-to="4"><a href="#"> <img style="width:80px; height: 80px;" src="{{asset('public/images/home-9.jpg')}}"></a></li>
          <li data-target="#myCarousel" data-slide-to="5"><a href="#"> <img style="width:80px; height: 80px;" src="{{asset('public/images/slide-3.jpg')}}"></a></li>
          
        </ul>


    </div><!-- End Carousel -->

						</div>
						<!--ads-image-->
						
						
						@if (isset($reviewsPlugin) and !empty($reviewsPlugin))
							@if (view()->exists('reviews::ratings-single'))
								@include('reviews::ratings-single')
							@endif
						@endif
						
						<div class="overvw">
								<h2>Overview</h2>
						</div>
						<div class="ads-details">
							<!-- <ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab-details" data-toggle="tab"><h4>{{ t('Ad\'s Details') }}</h4></a>
								</li>
								@if (isset($reviewsPlugin) and !empty($reviewsPlugin))
									<li>
										<a href="#tab-{{ $reviewsPlugin->name }}" data-toggle="tab">
											<h4>
												{{ trans('reviews::messages.Reviews') }}
												@if (isset($rvPost) and !empty($rvPost))
												({{ $rvPost->rating_count }})
												@endif
											</h4>
										</a>
									</li>
								@endif
							</ul> -->
							
							<!-- Tab panes -->
							<div class="row" style="background-color: #fff;">
									<div class="col-sm-8">
										<div class="table-responsive table-hover">          
										  <table class="table property-table">
										    <tbody>
										      <tr>
										        <td>Property name</td>
										        <td>{{ $post->title }}</td>
										        
										      </tr>
										       <tr>
										        <td>Property Type</td>
										        <td>{{ $parentCat->name }}</td>
										        
										      </tr>
										      <tr>
										        <td>Property For</td>
										        <td>{{ $cat->name }}</td>
										        
										      </tr>
										      <tr>
										        <td>Size</td>
										        <td>{{ $post->size }} sqft</td>
										        
										      </tr>
										      <tr>
										        <td><span><i class="fa fa-map-marker"></i> {{ t('Location') }}: </span></td>
										        <td><span>
														<a href="{!! lurl(trans('routes.v-search-city', [
															'countryCode' => $country->get('icode'),
															'city' 		  => slugify($post->city->name),
															'id' 		  => $post->city->id
															])) !!}">
																{{ $post->city->name }}
															</a>
													</span></td>
										        
										      </tr>
										      <tr>
										        <td>Address</td>
										        <td>{{ $post->address }}</td>
										        
										      </tr>
										    </tbody>
										  </table>
										  </div>
									</div>
									<div class="col-sm-4">
										<div class="table-responsive table-hover">
											<table class="table">
										    <tbody>
										      <tr>
										        <td>Handover</td>
										        <td>{{ $post->handover_date }}</td>
										        
										      </tr>
										   </tbody>
										  </table>
										</div>
									</div>
							</div>
							<div class="overvw">
								<h2>Description</h2>
							</div>
							<div class="tab-content">
								<div class="tab-pane active" id="tab-details">
									<div class="row" style="padding: 10px;">
										<div class="ads-details-info col-md-12 col-sm-12 col-xs-12 enable-long-words from-wysiwyg">
											
											<!-- Location -->
											<div class="detail-line-lite col-md-6 col-sm-6 col-xs-6">
												<div>
													<span><i class="fa fa-map-marker"></i> {{ t('Location') }}: </span>
													<span>
														<a href="{!! lurl(trans('routes.v-search-city', [
															'countryCode' => $country->get('icode'),
															'city' 		  => slugify($post->city->name),
															'id' 		  => $post->city->id
															])) !!}">
																{{ $post->city->name }}
															</a>
													</span>
												</div>
											</div>
											@if (!in_array($parentCat->type, ['not-salable']))
												<!-- Price / Salary -->
												<div class="detail-line-lite col-md-6 col-sm-6 col-xs-6">
													<div>
														<span>
															{{ (!in_array($parentCat->type, ['job-offer', 'job-search'])) ? t('Price') : t('Salary') }}:
														</span>
														<span>
															@if ($post->price > 0)
																{!! \App\Helpers\Number::money($post->price) !!}
															@else
																{!! \App\Helpers\Number::money(' --') !!}
															@endif
															@if ($post->negotiable == 1)
																<small class="label label-success"> {{ t('Negotiable') }}</small>
															@endif
														</span>
													</div>
												</div>
											@endif
											<div style="clear: both;"></div>
											<hr>
											
											<!-- Description -->
											<div class="detail-line-content">
												@if (config('settings.simditor_wysiwyg') || config('settings.ckeditor_wysiwyg'))
													{!! auto_link(\Mews\Purifier\Facades\Purifier::clean($post->description)) !!}
												@else
													{!! nl2br(auto_link(str_clean($post->description))) !!}
												@endif
											</div>

											
											<!-- Custom Fields -->
											@include('post.inc.fields-values')


											<!-- mapping project -->
											<!-- <div class="col-md-12 col-sm-12" style="padding: 0;margin-top: 15px;">
												<h4>Map Location</h4>
												<div id="map_canvas" style="height: 500px; width: 100%"></div>
											</div>
											<div class="col-md-12 col-sm-12" style="padding: 0;margin-top: 15px;">
												<h4>Street View</h4>
												<div id="map_street_view" style="height: 500px; width: 100%"></div>
											</div> -->
											
											<!-- Actions -->

											<div class="detail-line-action col-md-12 col-sm-12 text-center">
												<hr>
												<div class="col-md-4 col-sm-4 col-xs-4">
												@if (Auth::check())
													@if ($user->id == $post->user_id)
														<a href="{{ lurl('posts/' . $post->id . '/edit') }}">
															<i class="fa fa-pencil-square-o tooltipHere" data-toggle="tooltip" data-original-title="{{ t('Edit') }}"></i>
														</a>
													@else
														@if ($post->email != '')
															<a data-toggle="modal" href="#contactUser">
																<i class="icon-mail-2 tooltipHere" data-toggle="tooltip" data-original-title="{{ t('Send a message') }}"></i>
															</a>
														@else
															<i class="icon-mail-2" style="color: #dadada"></i>
														@endif
													@endif
												@else
													@if ($post->email != '')
														<a data-toggle="modal" href="#contactUser">
															<i class="icon-mail-2 tooltipHere" data-toggle="tooltip" data-original-title="{{ t('Send a message') }}"></i>
														</a>
													@else
														<i class="icon-mail-2" style="color: #dadada"></i>
													@endif
												@endif
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4">
													<a class="make-favorite" id="{{ $post->id }}">
														@if (Auth::check())
															@if (\App\Models\SavedPost::where('user_id', $user->id)->where('post_id', $post->id)->count() > 0)
																<i class="fa fa-heart tooltipHere" data-toggle="tooltip" data-original-title="{{ t('Remove favorite') }}"></i>
															@else
																<i class="fa fa-heart-o" class="tooltipHere" data-toggle="tooltip" data-original-title="{{ t('Save ad') }}"></i>
															@endif
														@else
															<i class="fa fa-heart-o" class="tooltipHere" data-toggle="tooltip" data-original-title="{{ t('Save ad') }}"></i>
														@endif
													</a>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4">
													<a href="{{ lurl('posts/' . $post->id . '/report') }}">
														<i class="fa icon-info-circled-alt tooltipHere" data-toggle="tooltip" data-original-title="{{ t('Report abuse') }}"></i>
													</a>
												</div>
											</div>

										</div>
										
										<br>&nbsp;<br>
									</div>
								</div>
								
								@if (isset($reviewsPlugin) and !empty($reviewsPlugin))
									@if (view()->exists('reviews::comments'))
										@include('reviews::comments')
									@endif
								@endif
							</div>
						<div class="overvw">
								<h2>Amenities</h2>
						</div>
						<div class="amenit">
								<ul class="animat-list">
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Eid Congration Palce</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Mosque</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>School</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>College</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>University</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Hospital</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Water Supply</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Fire Service</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Post Office</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Banks</span></li>
									<li><i class="fa fa-check cort" aria-hidden="true"></i><span>Police Box</span></li>
								</ul>
						</div>
							<!-- /.tab content -->

							<!-- Street View	 -->
							<div class="overvw">
								<h2>STREET VIEW</h2>
						    </div>
							
							<div id="map_street_view" style="height: 480px; width: 100%"></div>
							<!-- Map View -->
							
							<div class="overvw">
								<h2>MAP VIEW</h2>
						    </div>
							<div id="map_canvas" style="height: 480px; width: 100%"></div>

							<div class="overvw">
								<h2>Video Review</h2>
						    </div>
						    <div class="video-rv">
						    	<iframe style="width: 100%;" height="315" src="https://www.youtube.com/embed/diMPq-7WEKs?rel=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
						    	
						    </div>

							<!-- @if(trim($post->video != ''))
							<div class="overvw">
								<h2>Video Review</h2>
						    </div>
						    <div class="video-rv">
						    	<iframe style="width: 100%; min-height:315px;" src="{{$post->video}}" frameborder="0" allowfullscreen></iframe>
						    </div>
						    @endif -->	
									
							<div class="content-footer text-left">
								<div class="col-md-12">
									<div class="col-md-6">
										@if (Auth::check())
											@if ($user->id == $post->user_id)
												<a class="btn btn-default" href="{{ lurl('posts/' . $post->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i> {{ t('Edit') }}</a>
											@else
												@if ($post->email != '')
													<a class="btn btn-default" data-toggle="modal" href="#contactUser"><i class="icon-mail-2"></i> {{ t('Send a message') }} </a>
												@endif
											@endif
										@else
											@if ($post->email != '')
												<a class="btn btn-default" data-toggle="modal" href="#contactUser"><i class="icon-mail-2"></i> {{ t('Send a message') }} </a>
											@endif
										@endif
										@if ($post->phone_hidden != 1 and !empty($post->phone))
											<a href="tel:{{ $post->phone }}" class="btn btn-success showphone">
												<i class="icon-phone-1"></i>
												{!! $phone !!}{{-- t('View phone') --}}
											</a>
										@endif
									</div>
									<div class="col-md-6 text-right">
										<ul class="add-share">
									  		<?php $shared_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
									  		<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{$shared_link}}" class="faccbook-a"></a></li>
									  		<li class="twitter"><a href="https://twitter.com/home?status={{$shared_link}}" class="twitter-a"></a></li>
									  		<li class="googleplus"><a href="https://plus.google.com/share?url={{$shared_link}}" class="googleplus-a"></a></li>
									  		<li class="lindn"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shared_link}}&title={{$post->title}}&summary={{$post->description}}&source={{$shared_link}}" class="lindn-a"></a></li>
									  	</ul>
									</div>
								</div>
										
							</div>
							
						    <div style="clear: both;">
								    	
						    	<!-- @-if (isVerifiedPost($post))
						    								         @-include('layouts.inc.social.horizontal')
						    							        @-endif -->
						    </div>
						</div>
					</div>
					<!--/.ads-details-wrapper-->
				</div>
				<!--/.page-content-->

				<div class="col-sm-4 page-sidebar-right padding_0">
					<aside style="background: #66A5CE; padding: 20px 15px;">
						<div class="panel sidebar-panel panel-contact-seller" style="background: #66A5CE; border:0 none;">
						<!-- 	<div class="panel-heading">{{ t('Contact advertiser') }}</div> -->
						<h2 style="">Advertiser details</h2>
						<div class="adv-logo">
								<img src="{{ asset('public/images/partner.png')}}" alt="partner">
						</div>
						<h4 style="text-align: center;color: #fff;">P-Bazar Properties Limited</h4>
						<div class="cont-det">
								<div class="lft-dtl">@if (isset($post->contact_name) and $post->contact_name != '')
											@if (isset($post->user) and $post->user->id != 1)
														{{ $post->contact_name }}
											@else
												{{ $post->contact_name }}
											@endif
										@endif</div>
								<div class="rlt-detl">Last Name</div>
								<div class="lft-dtl">Contact</div>
								<div class="rlt-detl">+8801248368788</div>
								<div class="lft-dtl">Email</div>
								<div class="rlt-detl">jamidari@gmail.com</div>
								<div style="clear: both;">
								<form>
										<h2>Message</h2>
									<textarea name="msg" class="msg">
										
									</textarea>
								</form>
								</div>
								<div style="clear: both;">
								<form>
										<h2>Discuss with seller</h2>
									<textarea name="msg" class="msg">
										
									</textarea>
								</form>
								</div>
								<button class="btn btn-primary btn-lg ner" style="background-color: #213689; font-size: 25px;">Go to<br><strong style="font-size: 30px; line-height: 30px;"> Forum Discussion</strong></button>
						</div>
							<div class="panel-content user-info" style="background: #66A5CE;">
							
							</div>
						</div>
						
						@if (config('settings.show_post_on_googlemap'))
							<!-- <div class="panel sidebar-panel">
								<div class="panel-heading">{{ t('Location\'s Map') }}</div>
								<div class="panel-content">
									<div class="panel-body text-left" style="padding: 0;">
										<div class="ads-googlemaps">
											<iframe id="googleMaps" width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
										</div>
									</div>
								</div>
							</div> -->
						@endif
						
						<!-- @if (isVerifiedPost($post))
							@include('layouts.inc.social.horizontal')
						@endif -->
					</aside>
					<div class="properti-list">
						 <button class="btn btn-primary btn-lg ner">Near to you</button>
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
					<div class="properti-list">
						 <button class="btn btn-primary btn-lg ner">Featured Properties</button>
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

			<div class="row" style="margin-top: 30px;">
			@include('home.inc.featured')
			@include('layouts.inc.advertising.bottom')
			@if (isVerifiedPost($post))
				@include('layouts.inc.tools.facebook-comments')
			@endif
		</div>
		</div>


	</div>
@endsection

@section('modal_message')
	@include('post.inc.compose-message')
@endsection

@section('after_styles')
	<!-- bxSlider CSS file -->
	<link href="{{ url('public/assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet"/>
@endsection

@section('after_scripts')
    @if (config('services.googlemaps.key'))
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemaps.key') }}" type="text/javascript"></script>
    @endif

    <!-- google map -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIHLiPatDWb0UrAP7Zze9PqeFWmy6PxQ0"></script> -->

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
					adaptiveHeight: true,
					touchEnabled: false,
					swipeThreshold: false,
					oneToOneTouch: false,
					preventDefaultSwipeX: true,
					preventDefaultSwipeY: true,
				};
				return ($(window).width() < 768) ? mobileSettings : pcSettings;
			};
			
			var thumbSlider;
			
			function tourLandingScript() {
				thumbSlider.reloadSlider(settings());
			}
			
			thumbSlider = $('.product-view-thumb').bxSlider(settings());
			$(window).resize(tourLandingScript);
			
			
			@if (config('settings.show_post_on_googlemap'))
				/* Google Maps */
				getGoogleMaps(
				'{{ config('services.googlemaps.key') }}',
				'{{ (isset($post->city) and !empty($post->city)) ? addslashes($post->city->name) . ',' . $country->get('asciiname') : $country->get('asciiname') }}',
				'{{ config('app.locale') }}'
				);
			@endif
            
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







		// map setting

var map;
var geocoder;
var title = $('#tab-map-view').attr('data-title');
var fullAddress = $('#tab-map-view').attr('data-title');
var address = 'Dhaka';//Default to USA

function initialize() {
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById('map_canvas'));
    map.setZoom(15);
    address = (fullAddress ? fullAddress : address);

    geocoder.geocode( { 'address': address}, function(results, status)
    {
        if (status == google.maps.GeocoderStatus.OK)
        {
            map.setCenter(new google.maps.LatLng(parseFloat("{{$post->lat}}"), parseFloat("{{$post->lon}}")));

            var streetView = document.getElementById('map_street_view');

            if (streetView)
            {
                var latitude = parseFloat("{{$post->lat}}");
                var longitude = parseFloat("{{$post->lon}}");
                address = new google.maps.LatLng(latitude,longitude);

                panorama = new google.maps.StreetViewPanorama(streetView);
                panorama.setPosition(address);
                panorama.setPov({
                    heading: 270,
                    pitch: 0
                });
                panorama.setVisible(true);
            }

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat("{{$post->lat}}"), parseFloat("{{$post->lon}}")),
                map: map,
                title: 'Hello World!'
            });


        } else {
            // $('a.initPan').addClass('hide');
            // $('a.initMap').addClass('hide');
            console.log('Geocode was not successful for the following reason: ' + status);
        }
    });
}

google.maps.event.addDomListener(window, 'load', initialize);


	</script>
	<script type="text/javascript">
		$('#myCarousel').carousel({
		interval:   4000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
	</script>
@endsection