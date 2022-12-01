<?php

namespace App\Http\Requests\Land;

use App\Models\Land;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'property_id' => 'nullable|exists:properties,id',
            'cadastral_sign' => 'nullable|numeric|digits_between:1,' . Land::CADASTRAL_SIGN_LENGTH,
            'total_area' => 'nullable|numeric',
            'measurement_date' => 'nullable|date',
        ];
    }
}
