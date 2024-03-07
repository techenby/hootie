<?php

namespace App\Http\Integrations\OpenWeather\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ForecastRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/data/2.5/forecast';
    }

    protected function defaultQuery(): array
    {
        return [
            'units' => 'imperial',
        ];
    }
}
