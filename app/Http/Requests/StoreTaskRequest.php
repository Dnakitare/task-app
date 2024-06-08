<?php

namespace App\Http\Requests;

class StoreTaskRequest extends BaseRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'member_ids' => 'required|array',
            'member_ids.*' => 'required|exists:members,id',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'member_ids.*.required' => 'Member ID is required',
            'member_ids.*.exists' => 'Member ID does not exist',
        ];
    }
}
