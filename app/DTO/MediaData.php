<?php
declare(strict_types=1);
namespace App\DTO;

class MediaData extends DataTransferObject
{
    public function __construct(
        public readonly string $url,
        public readonly string $mime,
        // TODO all other attributes
    ) {}
}
