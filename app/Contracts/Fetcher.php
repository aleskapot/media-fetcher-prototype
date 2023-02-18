<?php
declare(strict_types=1);
namespace App\Contracts;

interface Fetcher
{
    public function fetch(string $url): string;
}
