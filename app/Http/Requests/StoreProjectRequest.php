<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required|string|in:' . implode(',', [
                Project::STATUS_NOT_STARTED,
                Project::STATUS_ACTIVE,
                Project::STATUS_INACTIVE,
                Project::STATUS_COMPLETED,
            ]),
        ];
    }
}
