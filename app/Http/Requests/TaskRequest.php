<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
// php artisan make:request TaskRequest
// https://laravel,com/docs/9.x/validation#available-validation-rules
class TaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rule_task_unique = Rule::unique('tasks', 'task');
        if ($this -> method() !== 'POST') {
            $rule_task_unique -> ignore($this->route()->parameter('id'));
        }

        return [
            'task'=>['required', 'unique:Tasks'],
            'user'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian q:attribute harus diisi',
            'user.required' => 'nama pengguna harus diisi'
        ];
    }
}
