<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementRequest extends FormRequest
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
            'title' => 'required|unique:App\Achievement,title|string|min:2',
            'description' => 'required|string|min:10',
            'term' => 'required|numeric|max:100',
            'type' => 'numeric|max:1',
            'medal' => 'string',
            'users_select' => ''
        ];
    }
}
