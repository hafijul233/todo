<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTodoRequest extends FormRequest
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
        return [
            'task' => ['nullable', 'string'],
            'completed' => ['nullable', "boolean"]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'completed_at' => ($this->boolean('completed') == true) ? Carbon::now() : null
        ]);
    }
}
