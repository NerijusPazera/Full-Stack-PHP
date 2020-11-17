<?php

namespace App\Http\Requests;

class UpdateAchievementRequest extends StoreAchievementRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:2|unique:App\Achievement,title,' . $this->achievement,
            'description' => 'required|string|min:10',
            'term' => 'required|numeric|max:100',
            'type' => 'numeric|max:1',
            'medal' => 'string',
            'users_select' => ''
        ];
    }
}
