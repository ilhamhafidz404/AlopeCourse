<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize() {
    return auth()->user()->hasRole('admin');
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules() {
    return [
      "judul" => ["required",
        'min:10',
        'max:50'],
      'content' => ["required",
        'min:50'],
      'category' => "required",
      'status' => "required",
      "thumbnail" => ["image",
        'dimensions:max_width=3000,max_height=750']
    ];
  }
}