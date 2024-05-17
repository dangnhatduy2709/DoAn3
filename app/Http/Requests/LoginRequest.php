<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|min:6',
            'phone'=>  'regex:/^([0-9\s\-\+\(\)]*)$/',
            'DiaChi'=>'required|min:20',
            'email'=>'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(){
        return [
            'name.min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
            'name.required' => 'Vui lòng nhập :attribute',
            'SoDT.regex' => 'Trường :attribute không hợp lệ',
            'password.min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
            'password.required' => 'Vui lòng nhập :attribute',
            'email.email' => 'Trường :attribute phải là 1 địa chỉ email',
            'email.required' => 'Vui lòng nhập :attribute'
        ];
    }

    public function attributes(){
        return[
            'name' => 'họ và tên',
            'SoDT' => 'số điện thoại',
            'email' => 'email',
            'password' => 'mật khẩu'
        ];
    }
    
    public function withValidator($validator){
        $validator->after(function ($validator){
            if ($validator->errors()->count()>0){
                $validator->errors()->add('msg', 'Đăng kí không thành công!');
            }
        });
    }
}
