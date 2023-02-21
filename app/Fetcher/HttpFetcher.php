<?php
declare(strict_types=1);
namespace App\Fetcher;

use App\Contracts\Fetcher;
use App\Exception\ConnectionException;

// Possible more effective to use a singleton pattern to avoid instance reinitialize
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
        // Guzzle still strongly recommended https://docs.guzzlephp.org/en/stable/
        return '<html lang="en"></html>';
    }
}
