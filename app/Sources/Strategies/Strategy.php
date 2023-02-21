<?php
declare(strict_types=1);
namespace App\Sources\Strategies;

use DOMDocument;

interface Strategy
{
    public function media(DOMDocument $document): array;
}
