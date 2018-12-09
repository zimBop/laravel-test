<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $exceptId = $this->route('news') ? ',' .$this->route('news')->id : '';
        
        return [
            'title' => 'bail|required|max:255|unique:news,title' . $exceptId,
            'text' => 'required',
            'published' => 'in:0,1'
        ];
    }
}