<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category' => 'required|in:monthly,factsheet,prospectus,other',
            'file' => 'nullable|file|mimes:pdf|max:20480',
            'publish_date' => 'required|date',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'file.mimes' => 'The file must be a PDF.',
            'file.max' => 'The file must not be greater than 20MB.',
        ];
    }
}
