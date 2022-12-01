<?php

namespace App\Http\Requests\Land;

use App\Models\Land;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'property_id' => 'required|exists:properties,id',
            'cadastral_sign' => 'required|numeric|digits_between:1,' . Land::CADASTRAL_SIGN_LENGTH,
            'total_area' => 'required|numeric',
            'measurement_date' => 'required|date',
        ];
    }
}
