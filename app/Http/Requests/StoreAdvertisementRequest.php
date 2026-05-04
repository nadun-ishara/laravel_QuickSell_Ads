<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title'=>'required|string|max:255|min:5',
            'description'=>'required|string|min:50',
            'price'=>'required|numeric|min:1',
            'category_id'=>'required|exists:categories,id',
            'location_id'=>'required|exists:locations,id',
            'is_negotiable'=>'boolean',

            'images' => 'required|array|min:1|max:5',
            'images.*' =>'image|mimes:jpeg,png,jpg,webp|max:16384',
        ];
    }

    public function messages():array
    {
        return[
            'images.required'=> 'You must upload at least one photo.',
            'images.min'=> 'Please upload at least :min image.',
            'images.max'=> 'You can only upload up to :max images.',
            'images.*.image'=> 'The file must be an image (jpeg, png, jpg, webp).',
            'images.*.max'=> 'Each image must not be larger than 16MB.',
        ];
    }
}
