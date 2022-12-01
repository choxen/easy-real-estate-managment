<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
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
        $rules = [
            'type' => [
                'required', Rule::in(Client::types()),
            ],
        ];

        if ((int)$this->type === Client::TYPE_LEGAL) {
            return array_merge($rules, $this->legalRules());
        }

        return array_merge($rules, $this->privateRules());
    }

    private function privateRules(): array
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'personal_code' => 'required',
        ];
    }

    private function legalRules(): array
    {
        return [
            'company_name' => 'required',
            'company_reg_nr' => 'required',
        ];
    }
}
