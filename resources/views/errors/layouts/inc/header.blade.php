<div class="header">
    <nav class="navbar navbar-site navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url(config('app.locale') . '/') }}" class="navbar-brand logo logo-title">
                    <img src="{{ \Storage::url(config('settings.app_logo')) . getPictureVersion() }}" style="width:auto; height:40px; float:left; margin:0 5px 0 0;"/>
                    @if (isset($country) and !$country->isEmpty())
                        @if (file_exists(public_path() . '/images/flags/24/'.strtolower($country->get('code')).'.png'))
                            <span class="hidden-sm hidden-xs">
                                <img src="{{ url('images/flags/24/'.strtolower($country->get('code')).'.png') . getPictureVersion() }}" style="float: left; margin: 8px 0 0 0;">
                            </span>
                        @endif
                    @endif
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (!auth()->user())
                        <li><a href="{{ url(config('app.locale') . '/' . trans('routes.login')) }}"><i class="icon-user fa"></i> {{ t('Log In') }}</a></li>
                        <li><a href="{{ url(config('app.locale') . '/' . trans('routes.register')) }}"><i class="icon-user-add fa"></i> {{ t('Register') }}</a></li>
                        <li class="postadd">
                            <a class="btn btn-block btn-post btn-yellow" href="{{ url(config('app.locale') . '/posts/create') }}"> {{ t('Create Free Ads') }}</a>
                        </li>
                    @else
                        @if (isset($user))
                            <li><a href="{{ url(config('app.locale') . '/logout') }}">{{ t('Log Out') }} <i class="glyphicon glyphicon-off"></i>
                                </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>{{ $user->name }}</span>
                                    <i class="icon-user fa"></i>
                                    <i class="icon-down-open-big fa"></i>
                                </a>
                                <ul class="dropdown-menu user-menu">
                                    <li class="active">
                                        <a href="{{ url(config('app.locale') . '/account') }}">
                                            <i class="icon-home"></i> {{ t('Personal Home') }}
                                        </a>
                                    </li>
                                    <li><a href="{{ url(config('app.locale') . '/account/my-posts') }}"><i class="icon-th-thumb"></i> {{ t('My ads') }} </a></li>
                                    <li><a href="{{ url(config('app.locale') . '/account/favourite') }}"><i class="icon-heart"></i> {{ t('Favourite ads') }} </a></li>
                                    <li><a href="{{ url(config('app.locale') . '/account/saved-search') }}"><i class="icon-star-circled"></i> {{ t('Saved search') }} </a></li>
                                    <li><a href="{{ url(config('app.locale') . '/account/pending-approval') }}"><i class="icon-hourglass"></i> {{ t('Pending approval') }} </a></li>
                                    <li><a href="{{ url(config('app.locale') . '/account/archived') }}"><i class="icon-folder-close"></i> {{ t('Archived ads') }} </a></li>
                                    <li><a href="{{ url(config('app.locale') . '/account/messages') }}"><i class="icon-mail-1"></i> {{ t('Messages') }} </a></li>
                                    <li><a href="{{ url(config('app.locale') . '/account/transactions') }}"><i class="icon-money"></i> {{ t('Transactions') }} </a></li>
                                </ul>
                            </li>
                            <li class="postadd">
                                <a class="btn btn-block btn-post btn-yellow" href="{{ url(config('app.locale') . '/posts/create') }}"> {{ t('Create Free Ads') }}</a>
                            </li>
                        @endif
                    @endif

                    @if (isset($lang))
                        @if (count(LaravelLocalization::getSupportedLocales()) > 1)
                            <!-- Language selector -->
                            <li class="dropdown lang-menu">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                    {{ strtoupper(config('app.locale')) }}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if (strtolower($localeCode) != strtolower(config('app.locale')))
                                            <?php
                                            // Controller parameters
                                            $params = [
                                                    'countryCode' 	=> (isset($country) and !$country->isEmpty()) ? $country->get('icode') : '',
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
                                                    {{{ $properties['native'] }}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>