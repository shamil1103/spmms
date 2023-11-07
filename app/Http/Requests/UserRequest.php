<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    private int $userId;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'max:255', 'min:6'],
            'image'    => ['nullable', 'image', 'max:1024'],
        ];

        if (in_array(request()->method(), ['PUT', "PATCH"])) {
            $rules = [
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->userId)],
                'password' => ['nullable', 'string', 'max:255', 'min:6'],
                'image'    => ['nullable', 'image', 'max:1024'],
            ];
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {

        if (in_array(request()->method(), ['PUT', "PATCH"])) {
            $this->userId = $this->route('user');
        }

    }

}
