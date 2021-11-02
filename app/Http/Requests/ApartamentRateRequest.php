<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartamentRateRequest extends FormRequest
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
            "id_apartament" => ["required", "exists:apartaments,id"],
            "rating"        => ["required", "numeric", "min:0", "max:10"]
        ];
    }

    public function attributes()
    {
        return [
            "id_apartament" => "apartament"
        ];
    }
}
