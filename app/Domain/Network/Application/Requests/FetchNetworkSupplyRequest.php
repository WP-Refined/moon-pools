<?php

namespace App\Domain\Network\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FetchNetworkSupplyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'limit' => ['nullable', 'integer'],
        ];
    }
}
