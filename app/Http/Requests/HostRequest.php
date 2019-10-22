<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tcp' => 'min:1|max:65535',
            'udp' => 'min:1|max:65535',
            'http' => 'min:1|max:65535',
            'https' => 'min:1|max:65535',
            'rtsp' => 'min:1|max:65535',
        ];
    }
}
