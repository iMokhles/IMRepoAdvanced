<?php

namespace App\Http\Controllers\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserAccountInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return Auth::guard('user')->check();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::guard('user')->user();
        return [
            'email' => [
                'required',
                'email',
                Rule::unique($user->getTable())->ignore($user->getKey()),
            ],
            'name' => 'required',
        ];
    }
}