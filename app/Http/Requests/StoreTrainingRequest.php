<?php

namespace App\Http\Requests;

use App\Models\Exercise;
use App\Models\Training;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrainingRequest extends FormRequest
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
                Rule::unique(Training::class),
            ],
            'exercises.*.id' => [
                'required',
                Rule::exists(Exercise::class),
            ],
            'exercises.*.pivot.sets' => [
                'required',
                'min:1',
                'numeric',
            ],
            'exercises.*.pivot.repetitions' => [
                'required',
                'min:1',
                'numeric',
            ],
        ];
    }
}
