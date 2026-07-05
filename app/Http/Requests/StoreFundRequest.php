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
            'slug' => 'required|string|max:255|unique:funds,slug',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'strategy' => 'nullable|string',
            'objective' => 'nullable|string',
            'nav' => 'nullable|numeric',
            'ytd_return' => 'nullable|numeric',
            'five_year_return' => 'nullable|numeric',
            'inception_date' => 'nullable|date',
            'latest_report' => 'nullable|string|max:255',
            'fund_objective' => 'nullable|string',
            'investment_strategy' => 'nullable|string',
            'founded_date' => 'nullable|date',
            'asset_class' => 'nullable|string|max:255',
            'fund_type' => 'nullable|string|max:255',
            'suggestion_investion_time' => 'nullable|string|max:255',
            'subscription_fee' => 'nullable|string|max:255',
            'management_fee' => 'nullable|string|max:255',
            'status' => 'boolean',
        ];
    }
}
