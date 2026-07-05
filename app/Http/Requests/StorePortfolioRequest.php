<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'fund_id' => 'required|exists:funds,id',
            'company_name' => 'required|string|max:255',
            'ticker' => 'required|string|max:50',
            'sector' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0|max:100',
            'asset_type' => 'nullable|string|max:255',
        ];
    }
}
