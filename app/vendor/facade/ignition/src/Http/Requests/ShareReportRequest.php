<?php

namespace Facade\Ignition\Http\Requests;

use App\vendor\laravel\framework\src\Illuminate\Foundation\Http\FormRequest;

class ShareReportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'report' => 'required',
            'tabs' => 'required|array|min:1',
            'lineSelection' => [],
        ];
    }
}
