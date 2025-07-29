<?php

namespace App\Http\Requests\film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'is_published' => 'integer',
            'url_poster' => 'image|mimes:jpeg,png,jpg|max:1024',
            'genre_id' => 'required'
        ];
    }
}
