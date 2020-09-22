<?php

namespace App\Http\Requests;

use App\Http\Controllers\ApiResponse\ApiResponse;
use App\Http\Controllers\Traits\ResponseAble;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class RoleRequest extends FormRequest
{
    use ResponseAble;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if(!$this->role){
            $rules = [
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:roles',
            ];
        }
        else{
            $rules = [
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
            ];
        }
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        return $this->sendError(
            $errors,
            __('messages.validation_error'),
            ApiResponse::VALIDATION_ERROR
        );
    }

}
