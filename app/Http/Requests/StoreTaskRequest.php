<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
| WHAT IS A FORM REQUEST?
|--------------------------------------------------------------------------
|
| A Form Request moves validation rules OUT of your controller
| and into its own class. Benefits:
|
|   1. Controller stays clean (just business logic)
|   2. Rules are reusable and testable
|   3. authorize() can handle permission checks too
|
| HOW IT WORKS:
| When you type-hint this class in a controller method:
|
|   public function store(StoreTaskRequest $request)
|
| Laravel automatically:
|   1. Calls authorize() → if false, returns 403
|   2. Calls rules() → validates input
|   3. If validation fails → redirects back with errors
|   4. If all good → your controller code runs
|
*/

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Any authenticated user can create tasks
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'nullable|date',
        ];
    }
}
