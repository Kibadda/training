<?php

namespace App\Http\Requests;

use App\Models\Plan;
use App\Models\Training;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique(Plan::class)->ignore($this->get('id')),
            ],
            'trainings.*.id' => [
                'required',
                Rule::exists(Training::class),
            ],
            'active' => [
                'required',
                'boolean',
            ],
        ];
    }
}
