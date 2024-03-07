<?php

namespace App\Http\Integrations\OpenWeather\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class OneCallRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public float $lat, public float $lon)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/data/3.0/onecall';
    }

    protected function defaultQuery(): array
    {
        return [
            'units' => 'imperial',
            'exclude' => 'hourly,minutely',
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];
    }
}
