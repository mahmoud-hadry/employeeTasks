<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
//        dd($this->request);
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $this->id,
//            'phone' => 'required|string|max:20',
//            'password' => [
////                'required',
//                'string',
//                'min:8',            // Minimum 8 characters
//                'regex:/[A-Z]/',    // At least one uppercase letter
//                'regex:/[a-z]/',    // At least one lowercase letter
//                'regex:/[0-9]/',    // At least one digit
//                'regex:/[@$!%*?&]/' // At least one special character
//            ],
//            'department_id' => 'required|exists:departments,id',
            'image' => 'nullable|image|max:2048',
            ];
    }
}
