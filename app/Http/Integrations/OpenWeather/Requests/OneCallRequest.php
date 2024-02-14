<?php

namespace App\Http\Integrations\OpenWeather\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class OneCallRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/onecall';
    }

    protected function defaultQuery(): array
    {
        return [
            'units' => 'imperial',
            'exclude' => 'hourly,minutely',
        ];
    }
}
