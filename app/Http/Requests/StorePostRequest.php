<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
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
            'user_id' => 'integer|exists:users,id',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'nullable',
            'slug' => 'nullable|unique:posts,slug',
            'published' => 'nullable|boolean',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if(empty($this->slug)){
            $this->merge([
                'slug' => Str::slug($this->title),
            ]);
        }else{
            $this->merge([
                'slug' => Str::slug($this->slug),
            ]);
        }

        if(!isset($this->published)){
            $this->merge([
                'published' => 0
            ]);
        }
    }
}
