<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class RegisterUserFormRequest extends FormRequest {

    /**
     * Determine if user has access to make this request
     *
     * @return bool
     */
    public function authorize() {
        return false;
    }

    /**
     * Rules
     *
     * @return array
     */
    public function rules() {
        return [

        ];
    }

}
