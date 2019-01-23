
</div>
</div>
</div>

<div class="container-fluid padding_0 top-footer-sect">
			<div class="">
				<div class="container">
							<div class="row">
									<div class="col-sm-3 col-xs-6">
										<div class="jumi-cont-text">
												<div class="jumi-social">
													<i class="fa fa-map-marker" aria-hidden="true"></i>
												</div>
												<h3> ADDRESS</h3>
												<p>3015 Grand Ave, Coconut Grove,Merrick Way, FL 12345</p>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6">
										<div class="jumi-cont-text">
												<div class="jumi-social">
													<i class="fa fa-phone" aria-hidden="true"></i>
												</div>
												<h3>CALL US</h3>
												<p>Phone: 123-456-789-000 <br>Mobile: 123-456-789-000</p>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6">
										<div class="jumi-cont-text">
												<div class="jumi-social">
													<i class="fa fa-envelope-o" aria-hidden="true"></i>
												</div>
												<h3>EMAIL US</h3>
												<p>Info@yoursite.com <br>Support@yoursite.com</p>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6">
										<div class="jumi-cont-text">
												<div class="jumi-social">
													<i class="fa fa-clock-o" aria-hidden="true"></i>
												</div>
												<h3>OPEN HOUR</h3>
												<p>Mon - Sat: 8:00 AM - 18:00 PM Sun: Closed</p>
										</div>
									</div>
							</div>
							<div class="row footer-contnt">
									<div class="col-sm-3 col-xs-12">
										<img src="{{asset('public/images/Space-Home.png')}}">
										<p class="footer-text">
											Ut appareat maiestatis sit, quis suas nobis eam ei. Ius eu assum veniam liberavisse. Vel ignota atomorum intellegebat ne, his no menandri volutpat.
										</p>
										<ul class="fotr-contact">
			                                <li>
			                                    <i class="fa fa-map-marker"></i>
			                                    <span class="cont-text">456 Lake Road, Virginia, USA</span>
			                                </li>
			                                <li>
			                                    <i class="fa fa-phone"></i>
			                                    <span class="cont-text">+555 987 654 123</span>
			                                </li>
			                                <li>
			                                    <i class="fa fa-envelope-o"></i>
			                                    <span class="cont-text">info@rento.com</span>
			                                </li>
			                            </ul>
			                            <ul class="footer-social list-inline">
			                                <li>
			                                    <a href="#"><i class="fa fa-facebook"></i></a>  
			                                </li>
			                                <li>
			                                    <a href="#"><i class="fa fa-twitter"></i></a>
			                                </li>
			                                <li>
			                                    <a href="#"><i class="fa fa-dribbble"></i></a>
			                                </li>
			                                <li>
			                                    <a href="#"><i class="fa fa-google-plus"></i></a>
			                                </li>
			                                <li>
			                                    <a href="#"><i class="fa fa-linkedin"></i></a>
			                                </li>
			                            </ul>
									</div>
									<div class="col-sm-3 col-xs-12">
										<h3 class="fotter-title">latest properties</h3>
										<?php $latestpcount = 1; ?>
										@if (isset($posts) and count($posts) > 0)
										<?php
										foreach($posts as $key => $post):
										if($latestpcount>3){break;}
										if (empty($countries) or !$countries->has($post->country_code)) continue;
										// Get Post's URL
						                $postUrl = lurl(slugify($post->title) . '/' . $post->id . '.html');
						    
						                // Get Post's Pictures
						                $pictures = \App\Models\Picture::where('post_id', $post->id);
						                if ($pictures->count() > 0) {
						                    $postImg = resize($pictures->first()->filename, 'medium');
						                } else {
						                    $postImg = resize(config('larapen.core.picture.default'));
						                }
						                // Category
		                                $cacheId = 'category.' . $post->category_id . '.' . config('app.locale');
		                                $liveCat = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
		                                    $liveCat = \App\Models\Category::find($post->category_id);
		                                    return $liveCat;
		                                });
		        
		                                // Check parent
		                                if (empty($liveCat->parent_id)) {
		                                    $liveCatParentId = $liveCat->id;
		                                    $liveCatType = $liveCat->type;
		                                } else {
		                                    $liveCatParentId = $liveCat->parent_id;
		                                    
		                                    $cacheId = 'category.' . $liveCat->parent_id . '.' . config('app.locale');
		                                    $liveParentCat = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($liveCat) {
		                                        $liveParentCat = \App\Models\Category::find($liveCat->parent_id);
		                                        return $liveParentCat;
		                                    });
		                                    $liveCatType = (!empty($liveParentCat)) ? $liveParentCat->type : 'classified';
		                                }
						                ?>
						                <div class="col-xs-12 padding_0 footr-sec">
												<div class="col-xs-5 padding_0">
													<a class="f-desc" href="{{ lurl(slugify($post->title).'/'.$post->id.'.html') }}" title="{{ mb_ucfirst($post->title) }}">
													<img src="{{ $postImg }}">
													</a>
												</div>
												<div class="col-xs-7">
													<p class="f-desc"><a class="f-desc" href="{{ lurl(slugify($post->title).'/'.$post->id.'.html') }}" title="{{ mb_ucfirst($post->title) }}">
									{{ mb_ucfirst($post->title) }}
                                </a></p>
													<span class="f-price">@if (isset($liveCatType) and !in_array($liveCatType, ['not-salable']))
                                @if ($post->price > 0)
                                    {!! \App\Helpers\Number::money($post->price) !!}
                                @else
                                    {!! \App\Helpers\Number::money('--') !!}
                                @endif
                            @else
                                {{ '--' }}
                            @endif</span>
												</div>
										</div>
										<?php $latestpcount++; ?>
										<?php endforeach; ?>
										@endif
										
										
									</div>
									<div class="col-sm-3 col-xs-12 padding_0">
										<h3 class="fotter-title">GALLERY</h3>
										<div class="col-xs-12 padding_0 footr-gallery">
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/home-1.jpg')}}">
												   </a>
											</div>
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/home-4.jpg')}}">
												   </a>
											</div>
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/home-5.jpg')}}">
												   </a>
											</div>

										</div>
										<div class="col-xs-12 padding_0 footr-gallery">
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/home-7.jpg')}}">
												   </a>
											</div>
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/home-9.jpg')}}">
												   </a>
											</div>
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/beach1.jpg')}}">
												   </a>
											</div>

										</div>
										<div class="col-xs-12 padding_0 footr-gallery">
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/blog-8.jpg')}}">
												   </a>
											</div>
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/fh10.jpg')}}">
												   </a>
											</div>
											<div class="col-xs-4 padding_0">
													<a href="#">
													<img src="{{asset('public/images/home-1.jpg')}}">
												   </a>
											</div>

										</div>
									</div>
									<div class="col-sm-3 col-xs-12">
										 <h3 class="fotter-title">LATEST NEWS</h3>
										 <span class="letest-news">The team at Envato HQ celebrating  being included in @JobAdvisor_AU's
										 <a href="#" class="footer-links">#CoolCompanies</a> </span>
										  <span class="letest-news">It's not Monday yet, but who cares? Get our Cyber Monday Bundle now - 80+ items for $39
										 <a href="#" class="footer-links">http://enva.to/xFiKm</a> </span>
										 
										  <span class="letest-news">A great group of proud <a href="#" class="footer-links">#WhiteRibbonDay</a> supporters. Learn more about this important day at
										 <a href="#" class="footer-links">http://www.whiteribbon.org.au/ .</a> </span>
									</div>
							</div>
					
				</div> 
			</div>
</div>
<section>
		<div class="social-share-wrap">
			<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<div class="container clearfix" style="max-width: 1200px;">
				    <ul>
				       <li> <figure><i class="fa fa-facebook fa-3x" style="color: #3F5E9B;"></i></figure>
				          <h5><a target="_blank" href="#">
				            Like
				            </a> </h5>
							<h6>Like on Facebook</h6>
				        </li>
				        <li> <figure><i class="fa fa-twitter fa-3x" style="color: #159DD8;"></i></figure>
				          <h5><a target="#" href="#" class="" rel="">
				            Follow  </a> </h5>
							<h6>Follow on Twitter</h6>
				        </li>
				        <li> <figure><i class="fa fa-linkedin fa-3x" style="color: #247CBF;"></i></figure>
				          <h5> <a target="_blank" href="#">Follow</a></h5>
						  <h6>Follow on Linkedin</h6>
				        </li>
				        <li> <figure><i class="fa fa-google-plus fa-3x" style="color: #CE3631;"></i></figure>
				          <h5><a target="_blank" href="#">Circle</a></h5>
				          <h6>Follow On Circle</h6>
				        </li>
				           <li> <figure><i class="fa fa-pinterest-p fa-3x" style="color: #BD2126;"></i></figure>
				          <h5><a target="_blank" href="#">Pin it</a></h5>
				          <h6>Follow On Pinterest</h6>
				        </li>
				           <li> <figure><i class="fa fa-youtube fa-3x" style="color: #CC181E;"></i></figure>
				          <h5><a target="_blank" href="#">Subscribe</a></h5>
				          <h6>Subscribe On YouTube</h6>
				        </li>
				        <li> <figure><i class="fa fa-tumblr fa-3x" style="color: #36465D;"></i></figure>
				          <h5><a target="_blank" href="#">Len</a></h5>
				          <h6>Follow On Tumblr</h6>
				        </li>
				        <li> <figure><i class="fa fa-flickr fa-3x" style="color: #FF0084;"></i></figure>
				          <h5><a target="_blank" href="#">Follow</a></h5>
				          <h6>Follow On Flickr</h6>
				        </li>
				         <li> 
				         	<figure><i class="fa fa-instagram fa-3x" style="color: #E1D1C1;"></i></figure>
				          	<h5><a target="_blank" href="#">Follow</a></h5>
				          <h6>Follow On Instagram</h6>
				        </li>
				         <li> 
				         	<figure><i class="fa fa-video-camera fa-3x" aria-hidden="true" style="color: #1AB7EA;"></i></figure>
				          <h5><a target="_blank" href="#">Add DMS</a></h5>
				          <h6>Follow On DailyMn</h6>
				        </li>
				        
				      </ul>
				    </div>
				  <div class="atclear"></div></div>
				</div>
		</section>
<div class="container">
<div class="footer" id="footer">
	<div class="container">
		<ul class="pull-left navbar-link footer-nav list-inline" style="margin-left: -20px;">
			<li>
                @if ($pages->count() > 0)
                    @foreach($pages as $page)
				        <a href="{{ lurl(trans('routes.v-page', ['slug' => $page->slug])) }}"> {{ $page->name }} </a>
                    @endforeach
                @endif
				<a href="{{ lurl(trans('routes.contact')) }}"> {{ t('Contact') }} </a>
				<a href="{{ lurl(trans('routes.v-sitemap', ['countryCode' => $country->get('icode')])) }}"> {{ t('Sitemap') }} </a>
				@if (\App\Models\Country::where('active', 1)->count() > 1)
					<a href="{{ lurl(trans('routes.countries')) }}"> {{ t('Countries') }} </a>
				@endif
			</li>
			<li></li>
		</ul>
		<ul class="pull-right navbar-link footer-nav list-inline" style="padding-right: 0; margin-right: -20px;">
			<li>
				&copy; {{ date('Y') }} <a href="{{ url('/') }}" style="padding: 0;">{{ config('settings.app_name') }}</a>
			</li>
			<li>
				<a href="{{ config('settings.facebook_page_url') }}" target="_blank"><i class="icon-facebook-rect"></i></a>
                <a href="{{ config('settings.twitter_url') }}" target="_blank"><i class="icon-twitter-bird"></i></a>
			</li>
			@if (config('settings.show_powered_by'))
			<li>
				<a target="_blank" href="http://technobari.com">Powered by TechnoBari</a>
			</li>
			@endif
		</ul>
	</div>
</div>
<!-- /.footer -->