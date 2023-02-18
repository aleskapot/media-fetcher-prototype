<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Sources\Strategies\Strategy;

interface Source
{
    public function addStrategy(Strategy $strategy): self;

    public function parseMedia(string $page): array;
}
