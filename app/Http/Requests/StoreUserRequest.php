<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'roles' => 'required|string|in:admin,customer',
            'status' => 'required|integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
            'password_confirmation.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'gender.required' => 'Vui lòng chọn giới tính',
            'roles.required' => 'Vui lòng chọn quyền',
            'status.required' => 'Vui lòng chọn trạng thái',
        ];
    }
}
