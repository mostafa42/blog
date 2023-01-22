<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $rules = User::$rules ;
        $rules["name"] = "required" ;
        $rules["confirm_pass"] = "required|same:password" ;
        return $rules ;
    }
}
