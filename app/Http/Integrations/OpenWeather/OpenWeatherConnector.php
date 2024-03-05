<?php

namespace App\Http\Integrations\OpenWeather;

use Saloon\Http\Auth\QueryAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class OpenWeatherConnector extends Connector
{
    use AcceptsJson;

    public function __construct(public ?string $token = null)
    {
        if ($token === null) {
            $this->token = config("services.openweather.key");
        }
    }

    public function resolveBaseUrl(): string
    {
        return 'http://api.openweathermap.org';
    }

    protected function defaultAuth(): QueryAuthenticator
    {
        return new QueryAuthenticator('appid', $this->token);
    }
}
