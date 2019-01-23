<?php


namespace App\Http\Controllers\Account;

use App\Http\Controllers\Auth\Traits\VerificationTrait;
use App\Http\Requests\UserRequest;
use App\Models\Scopes\VerifiedScope;
use App\Models\UserType;
use Creativeorange\Gravatar\Facades\Gravatar;
use App\Models\Post;
use App\Models\SavedPost;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Helpers\Localization\Helpers\Country as CountryLocalizationHelper;
use App\Helpers\Localization\Country as CountryLocalization;
use App\Models\User;

class EditController extends AccountBaseController
{
	use VerificationTrait;
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$data = [];
		
		$data['countries'] = CountryLocalizationHelper::transAll(CountryLocalization::getCountries());
		$data['genders'] = Gender::trans()->get();
		$data['userTypes'] = UserType::all();
		$data['gravatar'] = (!empty($this->user->email)) ? Gravatar::fallback(url('images/user.jpg'))->get($this->user->email) : null;
		
		// Mini Stats
		$data['countPostsVisits'] = DB::table('posts')
			->select('user_id', DB::raw('SUM(visits) as total_visits'))
			->where('country_code', $this->country->get('code'))
			->where('user_id', $this->user->id)
			->groupBy('user_id')
			->first();
		$data['countPosts'] = Post::currentCountry()
			->where('user_id', $this->user->id)
			->count();
		$data['countFavoritePosts'] = SavedPost::whereHas('post', function ($query) {
                $query->currentCountry();
            })->where('user_id', $this->user->id)
			->count();
		
		// Meta Tags
		MetaTag::set('title', t('My account'));
		MetaTag::set('description', t('My account on :app_name', ['app_name' => config('settings.app_name')]));
		
		return view('account.edit', $data);
	}
	
	/**
	 * @param UserRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function updateDetails(UserRequest $request)
	{
		// Check if these fields has changed
		$emailChanged = $request->filled('email') && $request->input('email') != $this->user->email;
		$phoneChanged = $request->filled('phone') && $request->input('phone') != $this->user->phone;
		$usernameChanged = $request->filled('username') && $request->input('username') != $this->user->username;
		
		// Conditions to Verify User's Email or Phone
		$emailVerificationRequired = config('settings.email_verification') == 1 && $emailChanged;
		$phoneVerificationRequired = config('settings.phone_verification') == 1 && $phoneChanged;
  
		
		// Get User
		$user = User::withoutGlobalScopes([VerifiedScope::class])->find($this->user->id);
		
		// Update User's Data
		$user->gender_id = $request->input('gender');
		$user->name = $request->input('name');
		$user->country_code = $request->input('country');
		if ($phoneChanged) {
			$user->phone = $request->input('phone');
		}
		$user->phone_hidden = $request->input('phone_hidden');
		if ($emailChanged) {
			$user->email = $request->input('email');
		}
		if ($usernameChanged) {
			$user->username = $request->input('username');
		}
		$user->user_type_id = $request->input('user_type');
		$user->about = $request->input('about');

		$avatar = $request->file('avatar');
		if($avatar){
			$input['avatarname'] = 'user_'.$this->user->id.'_'.time().'.'.$avatar->getClientOriginalExtension();
		    $destinationPath = 'public/images/avatar';
		    $avatar->move($destinationPath, $input['avatarname']);
			$user->avatar = 'public/images/avatar/'.$input['avatarname'];
		}

		$profile_banner = $request->file('profile_banner');
		if($profile_banner){
			$input['profile_bannername'] = 'profile_banner_'.$this->user->id.'_'.time().'.'.$profile_banner->getClientOriginalExtension();
		    $destinationPath = 'public/images/profile_banner';
		    $profile_banner->move($destinationPath, $input['profile_bannername']);
			$user->profile_banner = 'public/images/profile_banner/'.$input['profile_bannername'];
		}

		$user->address = $request->input('address');
		$user->company_name = $request->input('company_name');

		$company_logo = $request->file('company_logo');
		if($company_logo){
			$input['company_logoname'] = 'logo_'.$this->user->id.'_'.time().'.'.$company_logo->getClientOriginalExtension();
		    $destinationPath = 'public/images/company_logo';
		    $company_logo->move($destinationPath, $input['company_logoname']);
			$user->company_logo = 'public/images/company_logo/'.$input['company_logoname'];
		}

		$user->company_description = $request->input('company_description');
		
		// Email verification key generation
		if ($emailVerificationRequired) {
			$user->email_token = md5(microtime() . mt_rand());
			$user->verified_email = 0;
		}
		
		// Phone verification key generation
		if ($phoneVerificationRequired) {
			$user->phone_token = mt_rand(100000, 999999);
			$user->verified_phone = 0;
		}
		
		// Don't logout the User (See User model)
		if ($emailVerificationRequired || $phoneVerificationRequired) {
			session(['emailOrPhoneChanged' => true]);
		}
		
		// Save User
		$user->save();
		
		// Message Notification & Redirection
		flash(t("Your details account has update successfully."))->success();
		$nextUrl = config('app.locale') . '/account';
		
		// Send Email Verification message
		if ($emailVerificationRequired) {
			$this->sendVerificationEmail($user);
			$this->showReSendVerificationEmailLink($user, 'user');
		}
		
		// Send Phone Verification message
		if ($phoneVerificationRequired) {
			// Save the Next URL before verification
			session(['itemNextUrl' => $nextUrl]);
			
			$this->sendVerificationSms($user);
			$this->showReSendVerificationSmsLink($user, 'user');
			
			// Go to Phone Number verification
			$nextUrl = config('app.locale') . '/verify/user/phone/';
		}
		
		// Redirection
		return redirect($nextUrl);
	}
	
	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function updateSettings(Request $request)
	{
        // Validation
        $rules = ['password' => 'between:6,60|dumbpwd|confirmed'];
        $this->validate($request, $rules);
        
		// Get User
		$user = User::find($this->user->id);
		
		// Update
		$user->disable_comments = (int)$request->input('disable_comments');
		if ($request->filled('password')) {
			$user->password = bcrypt($request->input('password'));
		}
		
		// Save
		$user->save();
		
		flash(t("Your settings account has update successfully."))->success();
		
		return redirect(config('app.locale') . '/account');
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function updatePreferences()
	{
		$data = [];
		
		return view('account.edit', $data);
	}
}
