<?php
declare(strict_types=1);
namespace App\Sources\Strategies;

interface Strategy
{
    public function media(string $content): array;
}
