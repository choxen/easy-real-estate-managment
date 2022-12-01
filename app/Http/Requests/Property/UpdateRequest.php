<?php

namespace App\Http\Requests\Property;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'name' => 'nullable',
            'cadastral_number' => 'nullable|numeric|digits_between:1,' . Property::CADASTRAL_NUMBER_LENGTH,
            'status' => [
                'nullable', Rule::in(Property::statuses()),
            ],
        ];
    }
}
