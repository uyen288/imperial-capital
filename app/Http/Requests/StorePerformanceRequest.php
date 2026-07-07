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
        return [
            // Performance chính
            'fund_id'     => 'required|exists:funds,id',
            'date'        => 'required|date',
            'nav'         => 'nullable|numeric',
            'one_month'   => 'nullable|numeric',
            'three_month' => 'nullable|numeric',
            'one_year'    => 'nullable|numeric',
            'three_year'  => 'nullable|numeric',
            'ytd'         => 'nullable|numeric',

            // Benchmark data (dynamic array, keyed by benchmark_id)
            'benchmarks'                => 'nullable|array',
            'benchmarks.*.benchmark_id' => 'required|exists:benchmarks,id',
            'benchmarks.*.nav'          => 'nullable|numeric',
            'benchmarks.*.one_month'    => 'nullable|numeric',
            'benchmarks.*.three_month'  => 'nullable|numeric',
            'benchmarks.*.one_year'     => 'nullable|numeric',
            'benchmarks.*.three_year'   => 'nullable|numeric',
            'benchmarks.*.ytd'          => 'nullable|numeric',
        ];
    }
}
