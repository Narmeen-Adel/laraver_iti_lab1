<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

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
        return[
            'title'=>'min:3|required|unique:posts',
            'description'=>'required|min:10',
            'user_id'=>'exists:users,id'
        ];
    }
    public function message()
    {
        return ['title.required'=>"title is short",
        'title.unique'=>"title is found ...",
        'description.required'=>"must insert description",
        'description.min'=>"description is short",
        'user_id.exists'=>"user not available "             
    ];
    }
}
