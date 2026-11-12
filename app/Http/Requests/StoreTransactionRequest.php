<?php

namespace App\Http\Requests;

use App\Enums\Currency;
use Illuminate\Validation\Rule;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'person_id' => ['required', 'exists:people,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'currency' => ['required', Rule::enum(Currency::class)],
            'occurred_on' => ['required', 'date'],
        ];
    }
}
