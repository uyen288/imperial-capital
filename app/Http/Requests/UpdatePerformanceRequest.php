<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerformanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(StorePerformanceRequest::baseRules(), [
            'fund_id' => 'required|exists:funds,id',
            'date'    => 'required|date',
        ]);
    }
}
