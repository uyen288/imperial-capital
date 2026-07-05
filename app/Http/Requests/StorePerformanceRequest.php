<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerformanceRequest extends FormRequest
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
            'date' => 'required|date',
            'nav' => 'nullable|numeric',
            'one_month' => 'nullable|numeric',
            'three_month' => 'nullable|numeric',
            'one_year' => 'nullable|numeric',
            'three_year' => 'nullable|numeric',
            'ytd' => 'nullable|numeric',
        ];
    }
}
