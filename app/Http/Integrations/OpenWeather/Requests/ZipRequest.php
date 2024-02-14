<?php

namespace App\Http\Integrations\OpenWeather\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ZipRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public string $zip)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/geo/1.0/zip';
    }

    protected function defaultQuery(): array
    {
        return [
            'zip' => $this->zip,
        ];
    }
}
