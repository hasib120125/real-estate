<?php
// Search parameters
$queryString = (Request::getQueryString() ? ('?' . Request::getQueryString()) : '');

// Get the Default Language
$cacheExpiration = (isset($cacheExpiration)) ? $cacheExpiration : config('settings.app_cache_expiration', 60);
$defaultLang = Cache::remember('language.default', $cacheExpiration, function () {
    $defaultLang = \App\Models\Language::where('default', 1)->first();
    return $defaultLang;
});
?>
<div class="header">
	<nav class="navbar navbar-site navbar-default" role="navigation">
		<div class="container">
			<div class="col-sm-3 c-l-md-3">
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="{{ lurl('/') }}" class="navbar-brand logo logo-title">
					<img src="{{ \Storage::url(config('settings.app_logo')) . getPictureVersion() }}" style="width:auto; height:40px; float:left; margin:0 5px 5px 0;"
						 alt="{{ strtolower(config('settings.app_name')) }}" class="tooltipHere" title="" data-placement="bottom"
						 data-toggle="tooltip" type="button"
						 data-original-title="{{ config('settings.app_name') . ((isset($country) and $country->has('name')) ? ' ' . $country->get('name') : '') }}"/>
				</a>
				@if (config('settings.activation_country_flag'))
					@if (isset($country) and !$country->isEmpty())
						@if (file_exists(public_path() . '/images/flags/32/'.strtolower($country->get('code')).'.png'))
							<span class="navbar-brand logo logo-title hidden-sm hidden-xs">
								@if (\App\Models\Country::where('active', 1)->count() > 1)
								<a href="{{ lurl(trans('routes.countries')) }}" title="{{ t('Countries') }}">
									<img src="{{ url('public/images/flags/32/'.strtolower($country->get('code')).'.png') . getPictureVersion() }}" style="float: left; margin: 6px 0 0 5px;">
								</a>
								@else
									<img src="{{ url('public/images/flags/32/'.strtolower($country->get('code')).'.png') . getPictureVersion() }}" style="float: left; margin: 6px 0 0 5px;">
								@endif
							</span>
						@endif
					@endif
				@endif
			</div>
		   </div>
		   <div class="col-sm-9 col-md-9" style="padding: 0px">
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ url('/') }}">HOME</a></li>
						<li><a href="{{ url('about-us') }}">ABOUT</a></li>
						<li><a href="#">PROPERTIES</a></li>
						<li><a href="#">SERVICE</a></li>
						<li><a href="{{ url('gallery') }}">GALLERY</a></li>
						<li><a href="{{ url('blog') }}">BLOG</a></li>
					@if (!auth()->user())

						<li><a href="{{ lurl(trans('routes.login')) }}"><i class="icon-user fa"></i> {{ t('Log In') }}</a></li>
						<li><a href="{{ lurl(trans('routes.register')) }}"><i class="icon-user-add fa"></i> {{ t('Register') }}</a></li>
						<li class="postadd">
							<a class="btn btn-block btn-border btn-post btn-yellow" href="{{ lurl('posts/create') }}"> {{ t('Create Free Ads') }}</a>
						</li>
					@else
						@if (isset($user))
							<li><a href="{{ lurl(trans('routes.logout')) }}"><i class="glyphicon glyphicon-off"></i> {{ t('Log Out') }} </a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-user fa"></i>
									<span>{{ $user->name }}</span>
									<i class=" icon-down-open-big fa"></i>
								</a>
								<ul class="dropdown-menu user-menu">
									<li class="active">
										<a href="{{ lurl('account') }}">
											<i class="icon-home"></i> {{ t('Personal Home') }}
										</a>
									</li>
									<li><a href="{{ lurl('account/my-posts') }}"><i class="icon-th-thumb"></i> {{ t('My ads') }} </a></li>
									<li><a href="{{ lurl('account/favourite') }}"><i class="icon-heart"></i> {{ t('Favourite ads') }} </a></li>
									<li><a href="{{ lurl('account/saved-search') }}"><i class="icon-star-circled"></i> {{ t('Saved search') }} </a></li>
									<li><a href="{{ lurl('account/pending-approval') }}"><i class="icon-hourglass"></i> {{ t('Pending approval') }} </a></li>
									<li><a href="{{ lurl('account/archived') }}"><i class="icon-folder-close"></i> {{ t('Archived ads') }}</a></li>
									<li><a href="{{ lurl('account/messages') }}"><i class="icon-mail-1"></i> {{ t('Messages') }}</a></li>
									<li><a href="{{ lurl('account/transactions') }}"><i class="icon-money"></i> {{ t('Transactions') }}</a></li>
								</ul>
							</li>
							<li class="postadd">
								<a class="btn btn-block btn-border btn-post btn-yellow" href="{{ lurl('posts/create') }}">{{ t('Create Free Ads') }}</a>
							</li>
						@endif
					@endif

					@if (count(LaravelLocalization::getSupportedLocales()) > 1)
					<!-- Language selector -->
					<li class="dropdown lang-menu">
						<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
							{{ strtoupper(config('app.locale')) }}
							<span class="caret"> </span>
						</button>
						<ul class="dropdown-menu" role="menu">
							@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
								@if (strtolower($localeCode) != strtolower(config('app.locale')))
									<?php
										// Controller parameters
										$params = [
												'countryCode' 	=> $country->get('icode'),
												'catSlug' 		=> (isset($uriPathCatSlug) ? $uriPathCatSlug : null),
												'subCatSlug' 	=> (isset($uriPathSubCatSlug) ? $uriPathSubCatSlug : null),
												'cityName' 		=> (isset($uriPathCityName) ? $uriPathCityName : null),
												'cityId' 		=> (isset($uriPathCityId) ? $uriPathCityId : null),
                                                'pageSlug' 		=> (isset($uriPathPageSlug) ? $uriPathPageSlug : null),
												];
										// Default
										$link       = LaravelLocalization::getLocalizedURL($localeCode, null, [], $params);
										$localeCode = strtolower($localeCode);
									?>
									<li>
										<a href="{{ $link }}" tabindex="-1" rel="alternate" hreflang="{{ $localeCode }}">
											<span class="lang-name"> {{{ $properties['native'] }}} </span>
										</a>
									</li>
								@endif
							@endforeach
						</ul>
					</li>
					@endif
				</ul>
			</div>
			</div>
		</div>
	</nav>
</div>
