<?php

namespace App\Http\Requests;

class RegisterRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'     => 'required|mb_between:2,200',
            'country'  => 'sometimes|required|not_in:0',
            'phone'    => 'max:20',
            'email'    => 'max:100|whitelist_email|whitelist_domain',
            'user_type'  => 'required|not_in:0',
            'password' => 'required|between:6,60|dumbpwd|confirmed',
            'term'     => 'accepted',
        ];
    
        // Email
        if ($this->filled('email')) {
            $rules['email'] = 'email|unique:users,email|' . $rules['email'];
        }
        if (isEnabledField('email')) {
            if (isEnabledField('phone') and isEnabledField('email')) {
                $rules['email'] = 'required_without:phone|' . $rules['email'];
            } else {
                $rules['email'] = 'required|' . $rules['email'];
            }
        }
    
        // Phone
        if ($this->filled('phone')) {
            $rules['phone'] = 'phone:' . $this->input('country', config('country.code')) . ',mobile|unique:users,phone|' . $rules['phone'];
        }
        if (isEnabledField('phone')) {
            if (isEnabledField('phone') and isEnabledField('email')) {
                $rules['phone'] = 'required_without:email|' . $rules['phone'];
            } else {
                $rules['phone'] = 'required|' . $rules['phone'];
            }
        }
    
        // Username
        if (isEnabledField('username')) {
            $rules['username'] = ($this->filled('username')) ? 'valid_username|allowed_username|between:3,100|unique:users,username' : '';
        }
    
        // Recaptcha
        if (config('settings.activation_recaptcha')) {
            $rules['g-recaptcha-response'] = 'required';
        }
        
        return $rules;
    }
    
    /**
     * @return array
     */
    public function messages()
    {
        $messages = [];
        
        return $messages;
    }
}