<?php

namespace App\Http\Requests;

use App\Models\Record;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer',
            'minute' => 'required|integer',
            'note' => 'nullable|string'
        ];
    }

    /**
     * @return App\Models\Record
     */
    public function makeRecord()
    {
        return new Record($this->validated());
    }
}
