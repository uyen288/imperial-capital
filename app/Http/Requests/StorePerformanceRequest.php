<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerformanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'fund_id' => 'required|exists:funds,id',
            'date'    => 'required|date',
        ]);
    }

    /**
     * Shared numeric rules for fund + all benchmarks.
     */
    public static function baseRules(): array
    {
        $prefixes = ['', 'vn_index_', 'dcds_', 'vesaf_'];
        $fields   = ['nav', 'one_month', 'three_month', 'one_year', 'three_year', 'ytd'];
        $rules    = [];

        foreach ($prefixes as $prefix) {
            foreach ($fields as $field) {
                $rules[$prefix . $field] = 'nullable|numeric';
            }
        }

        return $rules;
    }
}
