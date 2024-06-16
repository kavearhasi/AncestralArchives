<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEventValidationRequest extends FormRequest
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
            'event_name' => 'required|string',
            'event_description' => 'required',
            'event_banner' => 'nullable',
            'event_date' => 'nullable|after:today',
            'event_time' => 'nullable',
            'event_location' => 'nullable',
        ];
    }
}
