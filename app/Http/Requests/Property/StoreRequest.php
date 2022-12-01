<?php

namespace App\Http\Requests\Property;

use App\Models\Property;
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
            'client_id' => 'required|exists:clients,id',
            'name' => 'required',
            'cadastral_number' => 'required|numeric|digits_between:1,' . Property::CADASTRAL_NUMBER_LENGTH,
            'status' => [
                'required', Rule::in(Property::statuses()),
            ],
        ];
    }
}
