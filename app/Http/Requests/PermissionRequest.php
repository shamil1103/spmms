<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:255'],
            'permissions'   => ['required', 'array', 'min:1'],
            'permissions.*' => ['required', 'integer'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name'          => 'role name',
            'permissions'   => 'permission',
            'permissions.*' => 'permission',
        ];
    }
}
