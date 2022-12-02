<?php

namespace App\Http\Requests\Area;

use App\Models\Area;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'land_id' => 'nullable|exists:lands,id',
            'type' => [
                'nullable', Rule::in(Area::types()),
            ],
            'area_covered' => 'nullable|numeric',
        ];
    }
}
