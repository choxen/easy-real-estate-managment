<?php

namespace App\Http\Requests\Area;

use App\Models\Area;
use App\Models\Land;
use App\Rules\AreaSpaceRule;
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
        $land = Land::findOrFail($this->land_id);

        return [
            'land_id' => 'required|exists:lands,id',
            'type' => [
                'required', Rule::in(Area::types()),
            ],
            'area_covered' => [
                'required', 'numeric', new AreaSpaceRule($land),
            ],
        ];
    }
}
