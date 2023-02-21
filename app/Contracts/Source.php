<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Sources\SourceType;
use App\Sources\Strategies\Strategy;

interface Source
{
    public function addStrategy(Strategy $strategy): self;

    public function parseMedia(string $url): array;

    public function getType(): SourceType;
}
