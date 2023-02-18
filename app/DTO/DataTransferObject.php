<?php
declare(strict_types=1);
namespace App\DTO;

abstract class DataTransferObject
{
    // Some basic DTO logic such as object transform and serialize

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        // TODO
        return [];
    }
}
