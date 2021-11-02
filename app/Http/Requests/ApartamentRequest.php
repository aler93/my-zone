<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartamentRequest extends FormRequest
{
    use DefaultRequest;
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
            "name"        => ["required", "max:255"],
            "price"       => ["required", "numeric"],
            "currency"    => ["required"],
            "rating"      => ["required", "numeric"],
            "id_category" => ["required", "exists:categories,id"],
        ];
    }
}
