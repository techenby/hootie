<?php

namespace App\Http\Integrations\OpenWeather\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DailySummaryRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public float $lat, public float $lon, public string $date) {}

    public function resolveEndpoint(): string
    {
        return '/data/3.0/onecall/day_summary';
    }

    protected function defaultQuery(): array
    {
        return [
            'date' => $this->date,
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];
    }
}
