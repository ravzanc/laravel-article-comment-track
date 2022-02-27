<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class SessionRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'session_id' => 'required|string',
        ];
    }

    public function getSessionId(): string
    {
        return Arr::get($this->validated(), 'session_id');
    }
}
