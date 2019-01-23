<?php
function getPostFieldsValues($catNestedIds, $postId)
    {
        // Get the Post's Custom Fields by its Parent Category
        $customFields = App\Models\CategoryField::getFields($catNestedIds, $postId);
        
        // Get the Post's Custom Fields that have a value
        $postValue = [];
        if ($customFields->count() > 0) {
            foreach ($customFields as $key => $field) {
                if (!empty($field->default)) {
                    $postValue[$key] = $field;
                }
            }
        }
        
        return collect($postValue);
    }
?>
<section class="section" style="background: #efe6e63d;padding-bottom: 1px;">
		<div class="ass-title">
				<h1>Our Associate</h1>
		</div>
	   <div class="section-slide">
	   		<div class="rio-promos">
	   			<img src="{{ asset('public/images/partner.png') }}" />
			  	<img src="{{ asset('public/images/partner-2.png') }}" />
			  	<img src="{{ asset('public/images/partner-3.png') }}" />
			  	<img src="{{ asset('public/images/partner-4.png') }}" />
			  	<img src="{{ asset('public/images/partner.png') }}" />
			  	<img src="{{ asset('public/images/partner-2.png') }}" />
			  	<img src="{{ asset('public/images/partner-3.png') }}" />
			  	<img src="{{ asset('public/images/partner-4.png') }}" />
			  	<img src="{{ asset('public/images/partner.png') }}" />
			  	<img src="{{ asset('public/images/partner-2.png') }}" />
			  	<img src="{{ asset('public/images/partner-3.png') }}" />
			  	<img src="{{ asset('public/images/partner-4.png') }}" />
			  	
			</div>
		
	   </div>
 </section>
<section style="padding-bottom:20px; background:#fff;">
			<div class="container padding_0">
				<div class="row">
								<div style="display: block; clear: both; margin-top:20px;"><h1 class="w-offer">You can offer you</h1></div>
							<div class="col-sm-3 padding-5">
									<div class="houser-offer">
													<div class="houser-offer-content">
														<h3>commercial</h3>
														<em>real estate</em>
														<hr>
														<p>Vix no facilisi omittantur, in ius molestie incorrupte, eruditi similique cum id</p>
														<div class="list-value">
															<p>124 listings</p>
															<p>1.2M Value</p>
															<p>57 Sold</p>
														</div>
														<div>
														   <a href="#" class="view-btn">view more</a>
													     </div>
													</div>
													
											</div>

										</div>
							<div class="col-sm-3 padding-5">
											<div class="houser-offer">
												<div class="houser-offer-content">
														<h3>commercial</h3>
														<em>real estate</em>
														<hr>
														<p>Vix no facilisi omittantur, in ius molestie incorrupte, eruditi similique cum id</p>
														<div class="list-value">
															<p>124 listings</p>
															<p>1.2M Value</p>
															<p>57 Sold</p>
														</div>
														<div>
														   <a href="#" class="view-btn">view more</a>
													     </div>
													</div>
											</div>
							</div>
						<div class="col-sm-3 padding-5">
											<div class="houser-offer">
												<div class="houser-offer-content">
														<h3>commercial</h3>
														<em>real estate</em>
														<hr>
														<p>Vix no facilisi omittantur, in ius molestie incorrupte, eruditi similique cum id</p>
														<div class="list-value">
															<p>124 listings</p>
															<p>1.2M Value</p>
															<p>57 Sold</p>
														</div>
														<div>
														   <a href="#" class="view-btn">view more</a>
													     </div>
													</div>
											</div>
										</div>
							<div class="col-sm-3 padding-5">
											<div class="houser-offer">
												<div class="houser-offer-content">
														<h3>commercial</h3>
														<em>real estate</em>
														<hr>
														<p>Vix no facilisi omittantur, in ius molestie incorrupte, eruditi similique cum id</p>
														<div class="list-value">
															<p>124 listings</p>
															<p>1.2M Value</p>
															<p>57 Sold</p>
														</div>
														<div>
														   <a href="#" class="view-btn">view more</a>
													     </div>
													</div>
											</div>
										</div>
								</div>
					</div>
					
	</section> 
	<section style="background:#eee;padding-bottom:20px;">
		<div class="container padding_0">
				<div style="display: block; clear: both; margin-top: 30px; margin-bottom: 45px;"><h1 class="latest-offer">latest properties</h1></div>
				<div class="row padding_0">
				@if (isset($posts) and count($posts) > 0)
				<?php
                foreach($posts as $key => $post):
                if (empty($countries) or !$countries->has($post->country_code)) continue;
        
                // Get Pack Info
                $package = null;
                if ($post->featured == 1) {
                    $cacheId = 'package.' . $post->py_package_id . '.' . config('app.locale');
                    $package = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
                        $package = \App\Models\Package::transById($post->py_package_id);
                        return $package;
                    });
                }
        
                // Get PostType Info
                $cacheId = 'postType.' . $post->post_type_id . '.' . config('app.locale');
                $postType = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
                    $postType = \App\Models\PostType::transById($post->post_type_id);
                    return $postType;
                });
                if (empty($postType)) continue;
        
                // Get Post's URL
                $postUrl = lurl(slugify($post->title) . '/' . $post->id . '.html');
    
                // Get Post's Pictures
                $pictures = \App\Models\Picture::where('post_id', $post->id);
                if ($pictures->count() > 0) {
                    $postImg = resize($pictures->first()->filename, 'medium');
                } else {
                    $postImg = resize(config('larapen.core.picture.default'));
                }
    
                // Get the Post's City
                $cacheId = config('country.code') . '.city.' . $post->city_id;
                $city = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
                    $city = \App\Models\City::find($post->city_id);
                    return $city;
                });
                if (empty($city)) continue;


                $post->created_at = \Date::parse($post->created_at)->timezone(config('timezone.id'));
                                $post->created_at = $post->created_at->ago();
        
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
        
                                // Check translation
                                $liveCatName = $liveCat->name;

                                // Get category details
						        $cacheId = 'category.' . $post->category_id . '.' . config('app.locale');
						        
						        $cat = App\Models\Category::transById($post->category_id);
						            

                                // Get Category nested IDs
								$catNestedIds = (object)[
									'parentId' => $cat->parent_id,
									'id'       => $cat->tid,
								];
						  
								// Get Custom Fields
						        $customFields = getPostFieldsValues($catNestedIds, $post->id);
						        
                ?>
                <!-- include('post.inc.fields-values') -->
							<div  class="col-sm-6 col-lg-4 col-md-4 latest-col">
				
								<div class="property-img-sec">
										<a href="{{ lurl(slugify($post->title).'/'.$post->id.'.html') }}" title="{{ mb_ucfirst($post->title) }}"><div class="propert-img" style="background: url('{{ $postImg }}');background-repeat: no-repeat;background-size: cover;">
											
										</div></a>
										<div class="propty-info">
											<div class="info left-cont"><i class="inf-map fa fa-map-marker" aria-hidden="true"></i><span class="info-text"><a  href="{!! qsurl(config('app.locale').'/'.trans('routes.v-search', ['countryCode' => $country->get('icode')]), array_merge(Request::except(['l', 'location']), ['l'=>$post->city_id])) !!}" class="info-text">{{ $city->name }}</a></span></div>
											<div class="info price-cont">
												<span class="price">@if (isset($liveCatType) and !in_array($liveCatType, ['not-salable']))
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
								</div>
								<div class="extra-info">
										<div class="extra-box">
											<h2 class="box-header"><a href="{{ lurl(slugify($post->title).'/'.$post->id.'.html') }}" title="{{ mb_ucfirst($post->title) }}">
									{{ mb_ucfirst($post->title) }}
                                </a></h2>
												<span class="box-text">Et natum semper contentiones his, persius suscipit te est, in sit accommodare deterruisset.</span> 
										</div>
										<div class="box-footer">
											@if (isset($customFields) and $customFields->count() > 0)
											@foreach($customFields as $field)
											<?php
								            if (in_array($field->type, ['radio', 'select'])) {
								                if (is_numeric($field->default)) {
								                    $option = \App\Models\FieldOption::transById($field->default);
								                    if (!empty($option)) {
								                        $field->default = $option->value;
								                    }
								                }
								            }
								            if (in_array($field->type, ['checkbox'])) {
								                $field->default = ($field->default == 1) ? t('Yes') : t('No');
								            }
								            ?>
								            @if ($field->type == 'file')
								            @else
												@if (!is_array($field->default))
												<div class="scale">
													@if($field->name=='Size')
														<i class=" icn fa fa-bookmark"></i>
														<span class="icn-text">{{ $field->default }} sq ft</span>
													@elseif($field->name=='Rooms')
														<i class="fa fa-bed icn"></i>
														<span class="icn-text">{{ $field->default }} bedrooms</span>
													@elseif($field->name=='Baths')
														<i class="fa fa-tint icn"></i>
														<span class="icn-text">{{ $field->default }} baths</span>
													@endif
												</div>
												@else
												
												@endif
											@endif

											@endforeach
											@endif
										</div>
								</div>
							</div>
					<?php endforeach; ?>
					@endif
							
				</div>
			</div>
	</section>
	<section style="background:#F5F5F5;">
		<div class="container padding_0">
				<div class="row padding_0" style="padding-bottom:20px; background:#F5F5F5; margin-top:20px;">
					<div class="col-sm-12">
						<div style="display: block; clear: both;">
							<div class="header-style">
								<!-- <h1>Get Our Jamidari's Guied</h1> -->
								<h1><span style="margin-right: 10px;"><i class="fa fa-user-plus" aria-hidden="true" style="font-size: 24px;"></i></span>Create your account, It's 100% free</h1>
								</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-6">
						
							
					   </div>
					   <div class="col-sm-6">
						
							<!-- <div class="googlep" style="background-color: #E74C3C; color: #fff;border-radius: 5px;">
								<h1><span style="margin-right: 10px;"><i class="fa fa-google-plus" aria-hidden="true"></i></span>Connect with Google+</h1>
								</div> -->
						</div>
					
					</div>
				<div class="col-sm-12">
					<div class="col-sm-6">
						<div class="facc-accont" style="background-color: #658AD0; color: #fff; float:left;border-radius: 5px;">
								<h1><span style="margin-right: 10px;"><i class="fa fa-facebook" aria-hidden="true"></i></span>Connect with Facebook</h1>
								</div>
								<div class="googlep" style="background-color: #E74C3C; color: #fff;border-radius: 5px; float: right;">
								<h1><span style="margin-right: 10px;"><i class="fa fa-google-plus" aria-hidden="true"></i></span>Connect with Google+</h1>
								</div>
							<!-- <div style="display: block; clear: both;">
							<div class="header-style">
								<h1>Registration</h1>
								</div>
						</div> -->
						@if (isset($errors) and count($errors) > 0)
							<div class="col-lg-12 padding_0" style="padding: 0;">
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><strong>{{ t('Oops ! An error has occurred. Please correct the red fields in the form') }}</strong></h5>
									<ul class="list list-check">
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							</div>
						@endif
						@if (Session::has('flash_notification'))
							
								<div class="row" style="margin-bottom: -10px; margin-top: -10px;">
									<div class="col-lg-12">
										@include('flash::message')
									</div>
								</div>
						
						@endif
						<div class="col-sm-12 padding_0">
								
								<form id="signupForm" style="margin-top:20px;" class="form-horizontal" method="POST" action="{{ URL::to('register') }}">
									<div class="form-style-2">
									{!! csrf_field() !!}
									<fieldset>

										<!-- name -->
										<div class="form-group required <?php echo (isset($errors) and $errors->has('name')) ? 'has-error' : ''; ?>">
											<label class="col-md-3 control-label">{{ t('Name') }} <sup>*</sup></label>
											<div class="col-md-7">
												<input name="name" placeholder="{{ t('Name') }}" class="form-control input-md" type="text" value="{{ old('name') }}">
											</div>
										</div>

										<!-- country -->
										@if (!$ipCountry)
											<div class="form-group required <?php echo (isset($errors) and $errors->has('country')) ? 'has-error' : ''; ?>">
												<label class="col-md-3 control-label" for="country">{{ t('Your Country') }} <sup>*</sup></label>
												<div class="col-md-7">
													<select id="country" name="country" class="form-control sselecter">
														<option value="0" {{ (!old('country') or old('country')==0) ? 'selected="selected"' : '' }}>{{ t('Select') }}</option>
														@foreach ($countries as $code => $item)
															<option value="{{ $code }}" {{ (old('country', (!$country->isEmpty()) ? $country->get('code') : 0)==$code) ? 'selected="selected"' : '' }}>
																{{ $item->get('name') }}
															</option>
														@endforeach
													</select>
												</div>
											</div>
										@else
											<input id="country" name="country" type="hidden" value="{{ $country->get('code') }}">
										@endif

										@if (isEnabledField('phone'))
										<!-- phone -->
										<div class="form-group required <?php echo (isset($errors) and $errors->has('phone')) ? 'has-error' : ''; ?>">
											<label class="col-md-3 control-label">{{ t('Phone') }}
												@if (!isEnabledField('email'))
													<sup>*</sup>
												@endif
											</label>
											<div class="col-md-7">
												<div class="input-group">
													<span id="phoneCountry" class="input-group-addon">{!! getPhoneIcon(old('country', $country->get('code'))) !!}</span>
													<input name="phone" placeholder="{{ t('Phone Number') }}"
														   class="form-control input-md" type="text" value="{{ phoneFormat(old('phone'), old('country', $country->get('code'))) }}">
												</div>
											</div>
										</div>
										@endif
									
										@if (isEnabledField('email'))
										<!-- email -->
										<div class="form-group required <?php echo (isset($errors) and $errors->has('email')) ? 'has-error' : ''; ?>">
											<label class="col-md-3 control-label" for="email">{{ t('Email') }}
												@if (!isEnabledField('phone'))
													<sup>*</sup>
												@endif
											</label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-mail"></i></span>
													<input id="email" name="email" type="email" class="form-control" placeholder="{{ t('Email') }}" value="{{ old('email') }}">
												</div>
											</div>
										</div>
										@endif

										<!-- user_type -->
										<div class="form-group required <?php echo (isset($errors) and $errors->has('user_type')) ? 'has-error' : ''; ?>">
											<label class="col-sm-3 control-label" for="userType">{{ t('You are a') }} <sup>*</sup></label>
											<div class="col-sm-7">
												<select name="user_type" id="userType" class="form-control selecter">
													<option value="0" @if (old('user_type')=='' or old('user_type')==0)selected="selected"@endif>
														{{ t('Select') }}
													</option>
													@foreach ($userTypes as $type)
														<option value="{{ $type->id }}">
															{{ t($type->name) }}
														</option>
													@endforeach
												</select>
											</div>
										</div>
									
										@if (isEnabledField('username'))
										<!-- username -->
										<div class="form-group required <?php echo (isset($errors) and $errors->has('username')) ? 'has-error' : ''; ?>">
											<label class="col-md-3 control-label" for="email">{{ t('Username') }}</label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-user"></i></span>
													<input id="username" name="username" type="text" class="form-control" placeholder="{{ t('Username') }}" value="{{ old('username') }}">
												</div>
											</div>
										</div>
										@endif
										
										<!-- password -->
										<div class="form-group required <?php echo (isset($errors) and $errors->has('password')) ? 'has-error' : ''; ?>">
											<label class="col-md-3 control-label" for="password">{{ t('Password') }} <sup>*</sup></label>
											<div class="col-md-7">
												<input id="password" name="password" type="password" class="form-control"
													   placeholder="{{ t('Password') }}">
												<br>
												<input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
													   placeholder="{{ t('Password Confirmation') }}">
												<p class="help-block">{{ t('At least 5 characters') }}</p>
											</div>
										</div>

										@if (config('settings.activation_recaptcha'))
											<!-- g-recaptcha-response -->
											<div class="form-group required <?php echo (isset($errors) and $errors->has('g-recaptcha-response')) ? 'has-error' : ''; ?>">
												<label class="col-md-3 control-label" for="g-recaptcha-response"></label>
												<div class="col-md-7">
													{!! Recaptcha::render(['lang' => config('app.locale')]) !!}
												</div>
											</div>
										@endif
									
										<!-- term -->
										<div class="form-group required <?php echo (isset($errors) and $errors->has('term')) ? 'has-error' : ''; ?>"
											 style="margin-top: -10px;">
											<label class="col-md-3 control-label"></label>
											<div class="col-md-9">
												<div class="termbox mb10">
													<label class="checkbox-inline" for="term">
														<input name="term" id="term" value="1" type="checkbox" {{ (old('term')=='1') ? 'checked="checked"' : '' }}>
														{!! t('I have read and agree to the <a href=":url">Terms & Conditions</a>', ['url' => getUrlPageByType('terms')]) !!}
													</label>
												</div>
												<div style="clear:both"></div>
											</div>
										</div>

										<!-- Button  -->
										<div class="form-group">
											<label class="col-md-3 control-label"></label>
											<div class="col-md-7">
												<button id="signupBtn" class="btn btn-success btn-lg"> {{ t('Register') }} </button>
											</div>
										</div>

										<div style="margin-bottom: 30px;"></div>

									</fieldset>
									</div>
								</form>
								
							</div>
							
					</div>
					<div class="col-sm-6">
						<div style="display: block; clear: both;">
							<div class="subsbtn" style="box-shadow: none;">
								<h1 >Subscribe here for your update</h1>
								</div>
						</div>
						<div class="col-sm-12 padding_0">
							<div class="form-style-2" style="margin-top:20px;">
									
									
									<label for="field1"><span>Name <span class="required">*</span></span><input type="text" class="input-field" name="field1" value="" /></label>
									<label for="field2"><span>Email <span class="required">*</span></span><input type="text" class="input-field" name="field2" value="" /></label>
									<label for="field2"><span>Telephone <span class="required">*</span></span><input type="text" class="input-field" name="field3" value="" /></label>
									
									<label for="field5"><span>Message <span class="required">*</span></span><textarea name="field5" class="textarea-field"></textarea></label>

									<label><span>&nbsp;</span><input type="submit" style="padding: 10px 20px; font-size:16px;" value="Subscribe" /></label>
									
									</div>
								</div>
					</div>
				</div>
		</div>
	</div>
	</section>

	<section style="background: #3F3F3F;">
			<div class="container padding_0">
						
						<div class="service">
							 <div class="col-md-12">
							 	 <div class="offer-service">
							 	 		<h2> we provide services</h2>
							 	 </div>
							 </div>
							 <div class="serv-cont row">
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-search-minus"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">property search</h3></a>
							 				<span class="serv-item-desc">With Jamidari.com search your needs are our priority. Whether you are relocating to the Dhaka and looking for a property search and relocation agent or a private client needing a property search agent to find the right home for your family, you will find at jamirari.com a service that will exceed your expectations.</span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-map-marker"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Map Pointing</h3></a>
							 				<span class="serv-item-desc">Jamidari makes it easy for you to create real estate maps from a group of listings, sales, or other properties. If you’re a seller’s agent, buyer’s agent, seller or buyer, a map helps visualize the places that matter
											</span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-user"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Property Profile Full Fillment</h3></a>
							 				<span class="serv-item-desc">We will help you to create your profile on our system. That will help you to make your listing more easier for buyer and sellers to boost your business. We will setup each of our clients profile they maintain their property management for the customers. </span>
							 			</div>
							 		</div>
							 		</div>
							 </div>
							 <div class="serv-cont row">
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-home"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">property settlement</h3></a>
							 				<span class="serv-item-desc">As well as dividing the assets and financial resources, property settlement also involves the division of any liabilities. Liabilities will include debts, loans, tax and stamp duty obligations.</span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-shopping-cart"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Property Buy and Sell</h3></a>
							 				<span class="serv-item-desc">We will help you to buy or sell any kind of property with consultancy.  We hope you deserve the best property to buy as your needs. If you want to sell your property with your desire market rates to sell your property to the targeted buyers.
											</span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-gavel"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Legal Consultation</h3></a>
							 				<span class="serv-item-desc">Jamidar.com has great expertise in Legal Consultancy. We have 30 years experience in this field. That must help you to provide the best.  We provide any kind of official legal papers to solve your property management. </span>
							 			</div>
							 		</div>
							 		</div>
							 </div>
							 <div class="serv-cont row">
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-building"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Construction Contractors</h3></a>
							 				<span class="serv-item-desc">We have a large amount of database about Construction Contractors. We can provide the best that fits with your needs. They have high skill to develop Commercial, Apartment , Duplex House & Shopping malls . They works already with many popular real state agency in Bangladesh.</span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-users"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Connecting to Buyers</h3></a>
							 				<span class="serv-item-desc">We always believe customer satisfaction is the best policy of business. We want to ensure each our buyers and sellers has a good relationship through our platform to claim their perfect property after the sell  service. We will monetize of our buyers and sellers their relationship through the business. 
											</span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-male"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Agent</h3></a>
							 				<span class="serv-item-desc">We provide you high volume of database of property business.  We have available Property Management Features to manage your business  That you can use to build up your client list. Also  you can track your selling report through our platform as a property agent. </span>
							 			</div>
							 		</div>
							 		</div>
							 </div>
							 <div class="serv-cont row">
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-archive"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Property Leases Management</h3></a>
							 				<span class="serv-item-desc">We will help you how to lease the property to the buyers with all legal documents that ensure do the business. </span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-flag"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Property Management Service</h3></a>
							 				<span class="serv-item-desc">Owning investment property can be a lucrative way to supplement your income while providing accommodation for renters (tenants) across Bangladesh. However, sometimes the commitment can be larger than people imagine, leading to inattentiveness and the chance of wasted potential in the long term. However, one solution to this problem is to get in contact with the team at Jamiradi.com to discuss the option of professional property management for your real estate portfolio. 
											</span>
							 			</div>
							 		</div>
							 		</div>
							 		<div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
							 			<div class="serv-cont-item">
							 			<div class="serv-cont-item-img col-md-2">
							 				<i class="fa fa-bullhorn" aria-hidden="true"></i>
							 			</div>
							 			<div class="serv-cont-item-desc col-md-10">
							 				<a href="#" style="text-decoration: none;"><h3 class="serv-item-header">Property Branding</h3></a>
							 				<span class="serv-item-desc">Jamidari  will help you to popular the customer as a brand of your property business.  You can advertise your product through our platform with high placement in social. Also you can make advertise to brand your products through the branding of our system.  Keep your mind that we will advertise your products to promote as a branding from our company to the third party platform with no additional charge.  </span>
							 			</div>
							 		</div>
							 		</div>
							 </div>
						</div>
			</div>
	</section>
</div>