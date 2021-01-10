<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadSongRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'song_thumbnail' => 'required|image',
            'song_file' => 'required|mimes:jpeg,png,gif,webp,mp3|max:2048',
        ];
    }
}