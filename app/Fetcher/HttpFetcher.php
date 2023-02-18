<?php
declare(strict_types=1);
namespace App\Fetcher;

use App\Contracts\Fetcher;
use App\Exception\ConnectionException;

class HttpFetcher implements Fetcher
{

    public function __construct(
        protected float $connectTimeout = 10.0,
        protected array $headers = [],
    )
    {}

    /**
     * @param string $url
     * @return string
     * @throws ConnectionException
     */
    public function fetch(string $url): string
    {
        // TODO: Implement http fetch() method
        // Guzzle still strongly recommended https://docs.guzzlephp.org/en/stable/
        return '';
    }
}
