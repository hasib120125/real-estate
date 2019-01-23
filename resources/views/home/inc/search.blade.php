<?php
use Illuminate\Support\Facades\Input;

// Category
$qCategory = (isset($cat) and !empty($cat)) ? $cat->tid : Input::get('c');

// Location
if (isset($city) and !empty($city)) {
	$qLocationId = (isset($city->id)) ? $city->id : 0;
	$qLocation = $city->name;
	$qAdmin = Input::get('r');
} else {
	$qLocationId = Input::get('l');
	$qLocation = (Input::filled('r')) ? t('area:') . rawurldecode(Input::get('r')) : Input::get('location');
    $qAdmin = Input::get('r');
}
?>
<!-- <div class="container">
	<div class="intro">
		<div class="dtable hw100">
			<div class="dtable-cell hw100">
				<div class="container text-center">
					<div class="row search-row fadeInUp">
						<form id="seach" name="search" action="{{ lurl(trans('routes.v-search', ['countryCode' => $country->get('icode')])) }}" method="GET">
							<div class="col-lg-5 col-sm-5 search-col relative">
								<i class="icon-docs icon-append"></i>
								<input type="text" name="q" class="form-control keyword has-icon" placeholder="{{ t('What?') }}" value="">
							</div>
							<div class="col-lg-5 col-sm-5 search-col relative locationicon">
								<i class="icon-location-2 icon-append"></i>
								<input type="hidden" id="lSearch" name="l" value="">
								<input type="text" id="locSearch" name="location" class="form-control locinput input-rel searchtag-input has-icon tooltipHere"
									   placeholder="{{ t('Where?') }}" value="" title="" data-placement="bottom"
									   data-toggle="tooltip" type="button"
									   data-original-title="{{ t('Enter a city name OR a state name with the prefix ":prefix" like: :prefix', ['prefix' => t('area:')]) . t('State Name') }}">
							</div>
							<div class="col-lg-2 col-sm-2 search-col">
								<button class="btn btn-primary btn-search btn-block"><i class="icon-search"></i> <strong>{{ t('Find') }}</strong>
								</button>
							</div>
							{!! csrf_field() !!}
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid padding_0">
		<div class="head-section">
				<div class="container">
							<div class="search-bar search-row-wrapper" style="padding: 80px 52px 50px 50px;background: transparent;max-width: 1170px;margin: 0 auto;">
								<div class="searbar-txt">
								 <ul class="nav nav-tabs bdr-none menu-active">
								   <li class="active"><a data-toggle="tab" href="#sale">FOR SALE</a></li>
								   <li><a data-toggle="tab" href="#rent-flat">FOR RENT</a></li>
								    <li><a data-toggle="tab" href="#new">NEW PROJECTS</a></li>
								    <li><a data-toggle="tab" href="#special">SPECIAL PROJECTS</a></li>
								  </ul>
								 </div>
									<div class="tab-content srch-input">
								    <div id="sale" class="tab-pane fade in active">
								     <div class="row srch-land">
								     		<form id="seach" name="search" action="{{ lurl(trans('routes.v-search', ['countryCode' => $country->get('icode')])) }}" method="GET">
								     			<!-- <div class="col-sm-3" style="padding-left: 1px; padding-right: 1px;">
													<input name="q" class="form-control keyword" type="text" placeholder="{{ t('What?') }}" value="">
												</div> -->
												<div class="col-sm-3 col-xs-12">
								     				<select name="c" id="catSearch" class="form-control selecter">
														<option value="" {{ ($qCategory=='') ? 'selected="selected"' : '' }}> Property type </option>
														@if (isset($cats) and $cats->count() > 0)
															@foreach ($cats->groupBy('parent_id')->get(0) as $itemCat)
																<option {{ ($qCategory==$itemCat->tid) ? ' selected="selected"' : '' }} value="{{ $itemCat->tid }}" > {{ $itemCat->name }} 
																</option>
															@endforeach
														@endif
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_by_division" name="admin_code">
														<option value="">Select Division</option>
														<option value="BD.85">Barisal</option>
														<option value="BD.84">Chittagong</option>
														<option value="BD.81">Dhaka</option>
														<option value="BD.82">Khulna</option>
														<option value="BD.H">Mymensingh</option>
														<option value="BD.83">Rajshahi</option>
														<option value="BD.87">Rangpur</option>
														<option value="BD.86">Sylhet</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_from_division sselecter" name="district">
														<option value="">Select District</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control area_from_city sselecter" name="l">
														<option value="">Select Area</option>
													</select>
								     			</div>
								     			<!-- <div class="col-sm-3 col-xs-12 search-col locationicon" style="padding-left: 1px; padding-right: 1px;">
								     				<i class="icon-location-2 icon-append" style="margin-top: -6px; margin-left: 1px;"></i>
													<input type="text" id="locSearch" name="location" class="form-control locinput input-rel searchtag-input has-icon tooltipHere" placeholder="{{ t('Where?') }}" value="{{ $qLocation }}" title="" data-placement="bottom" data-toggle="tooltip" type="button" data-original-title="{{ t('Enter a city name OR a state name with the prefix ":prefix" like: :prefix', ['prefix' => t('area:')]) . t('State Name') }}">
								     			</div> -->
								     			<div class="col-sm-3 col-xs-12" >
								     				<!-- <input placeholder="Maximum Price" type="text" class="jm-srch-input"  name="p" style="    height: 45px;margin-left: 3px;"> -->
								     				<button class="btn btn-warnning srch-btn" style="width:100%;"><i style="font-size: 20px;" class="fa fa-search" aria-hidden="true"></i></button>
								     			</div>
								     		</form>
								     </div>
								    </div>
								    <div id="rent-flat" class="tab-pane fade">
								      <div class="row srch-land">
								     		<form id="seach" name="search" action="{{ lurl(trans('routes.v-search', ['countryCode' => $country->get('icode')])) }}" method="GET">
												<div class="col-sm-3 col-xs-12">
								     				<select name="c" id="catSearch" class="form-control selecter">
														<option value="" {{ ($qCategory=='') ? 'selected="selected"' : '' }}> Property type </option>
														@if (isset($cats) and $cats->count() > 0)
															@foreach ($cats->groupBy('parent_id')->get(0) as $itemCat)
																<option {{ ($qCategory==$itemCat->tid) ? ' selected="selected"' : '' }} value="{{ $itemCat->tid }}" > {{ $itemCat->name }} 
																</option>
															@endforeach
														@endif
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_by_division" name="admin_code">
														<option value="">Select Division</option>
														<option value="BD.85">Barisal</option>
														<option value="BD.84">Chittagong</option>
														<option value="BD.81">Dhaka</option>
														<option value="BD.82">Khulna</option>
														<option value="BD.H">Mymensingh</option>
														<option value="BD.83">Rajshahi</option>
														<option value="BD.87">Rangpur</option>
														<option value="BD.86">Sylhet</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_from_division sselecter" name="district">
														<option value="">Select District</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control area_from_city sselecter" name="l">
														<option value="">Select Area</option>
													</select>
								     			</div>
								     			<div class="col-sm-3 col-xs-12" >
								     				<button class="btn btn-warnning srch-btn" style="width:100%;"><i style="font-size: 20px;" class="fa fa-search" aria-hidden="true"></i></button>
								     			</div>
								     		</form>
								     </div>
								      
								    </div>
								    <div id="new" class="tab-pane fade">
								      <div class="row srch-land">
								     		<form id="seach" name="search" action="{{ lurl(trans('routes.v-search', ['countryCode' => $country->get('icode')])) }}" method="GET">
												<div class="col-sm-3 col-xs-12">
								     				<select name="c" id="catSearch" class="form-control selecter">
														<option value="" {{ ($qCategory=='') ? 'selected="selected"' : '' }}> Property type </option>
														@if (isset($cats) and $cats->count() > 0)
															@foreach ($cats->groupBy('parent_id')->get(0) as $itemCat)
																<option {{ ($qCategory==$itemCat->tid) ? ' selected="selected"' : '' }} value="{{ $itemCat->tid }}" > {{ $itemCat->name }} 
																</option>
															@endforeach
														@endif
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_by_division" name="admin_code">
														<option value="">Select Division</option>
														<option value="BD.85">Barisal</option>
														<option value="BD.84">Chittagong</option>
														<option value="BD.81">Dhaka</option>
														<option value="BD.82">Khulna</option>
														<option value="BD.H">Mymensingh</option>
														<option value="BD.83">Rajshahi</option>
														<option value="BD.87">Rangpur</option>
														<option value="BD.86">Sylhet</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_from_division sselecter" name="district">
														<option value="">Select District</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control area_from_city sselecter" name="l">
														<option value="">Select Area</option>
													</select>
								     			</div>
								     			<div class="col-sm-3 col-xs-12" >
								     				<button class="btn btn-warnning srch-btn" style="width:100%;"><i style="font-size: 20px;" class="fa fa-search" aria-hidden="true"></i></button>
								     			</div>
								     		</form>
								     </div>
								     
								    </div>
								    <div id="special" class="tab-pane fade">
								      <div class="row srch-land">
								     		<form id="seach" name="search" action="{{ lurl(trans('routes.v-search', ['countryCode' => $country->get('icode')])) }}" method="GET">
												<div class="col-sm-3 col-xs-12">
								     				<select name="c" id="catSearch" class="form-control selecter">
														<option value="" {{ ($qCategory=='') ? 'selected="selected"' : '' }}> Property type </option>
														@if (isset($cats) and $cats->count() > 0)
															@foreach ($cats->groupBy('parent_id')->get(0) as $itemCat)
																<option {{ ($qCategory==$itemCat->tid) ? ' selected="selected"' : '' }} value="{{ $itemCat->tid }}" > {{ $itemCat->name }} 
																</option>
															@endforeach
														@endif
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_by_division" name="admin_code">
														<option value="">Select Division</option>
														<option value="BD.85">Barisal</option>
														<option value="BD.84">Chittagong</option>
														<option value="BD.81">Dhaka</option>
														<option value="BD.82">Khulna</option>
														<option value="BD.H">Mymensingh</option>
														<option value="BD.83">Rajshahi</option>
														<option value="BD.87">Rangpur</option>
														<option value="BD.86">Sylhet</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control city_from_division sselecter" name="district">
														<option value="">Select District</option>
													</select>
								     			</div>
								     			<div class="col-sm-2 col-xs-12">
								     				<select class="form-control area_from_city sselecter" name="l">
														<option value="">Select Area</option>
													</select>
								     			</div>
								     			<div class="col-sm-3 col-xs-12" >
								     				<button class="btn btn-warnning srch-btn" style="width:100%;"><i style="font-size: 20px;" class="fa fa-search" aria-hidden="true"></i></button>
								     			</div>
								     		</form>
								     </div>
								     
								    </div>
								    
								  </div>
							</div>
				</div>
		</div>
	
