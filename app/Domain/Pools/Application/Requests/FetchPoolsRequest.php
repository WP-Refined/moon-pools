<?php

namespace App\Domain\Pools\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FetchPoolsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'filter' => 'nullable',
        ];
    }
}
