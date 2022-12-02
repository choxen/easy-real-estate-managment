<?php

namespace App\Http\Requests\Area;

use App\Models\Area;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'land_id' => 'required|exists:lands,id',
            'type' => [
                'required', Rule::in(Area::types()),
            ],
            'area_covered' => 'required|numeric',
        ];
    }
}
