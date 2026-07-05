<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFundRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:255',

            'inception_date' => 'nullable|date',

            'nav' => 'nullable|numeric',
            'ytd_return' => 'nullable|numeric',
            'five_year_return' => 'nullable|numeric',

            'fund_objective' => 'nullable|string',
            'investment_strategy' => 'nullable|string',

            'asset_class' => 'nullable|string|max:255',
            'fund_type' => 'nullable|string|max:255',
            'strategy' => 'nullable|string',
            'suggested_investment_time' => 'nullable|string|max:255',
            'subscription_fee' => 'nullable|string|max:255',
            'management_fee' => 'nullable|string|max:255',

            'status' => 'boolean',
        ];
    }
}
