<?php

namespace App\Services\Frontend\UIElements;

use App\Services\Frontend\FormActionGenerator;

final class ActionForm
{
    const UPLOAD_HEADERS = [
        'Content-Type' => 'multipart/form-data',
    ];

    public function __construct(
        protected readonly string $url,
        protected readonly string $method = FormActionGenerator::HTTP_METHOD_POST,
        protected readonly array $headers = [],
    )
    {}

    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'method' => $this->method,
            'headers' => $this->headers,
        ];
    }
}
