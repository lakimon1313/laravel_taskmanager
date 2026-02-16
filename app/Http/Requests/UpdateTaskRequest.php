<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Authorization is handled by the Policy, so allow here
        return true;
    }

    public function rules(): array
    {
        // Same rules as StoreTaskRequest for now.
        // Having a separate class lets you change them independently later.
        // For example: maybe "update" allows partial updates (no 'required').
        return [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'nullable|date',
        ];
    }
}
