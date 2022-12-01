<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
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
        $rules = [
            'type' => [
                'required', Rule::in(Client::types()),
            ],
        ];

        if ((int) $this->type === Client::TYPE_LEGAL) {
            return array_merge($rules, $this->legalRules());
        }

        return array_merge($rules, $this->privateRules());
    }

    private function legalRules(): array
    {
        return [
            'company_name' => 'nullable',
            'company_reg_nr' => 'nullable',
        ];
    }

    public function privateRules(): array
    {
        return [
            'name' => 'nullable',
            'last_name' => 'nullable',
            'personal_code' => 'nullable',
        ];
    }
}
