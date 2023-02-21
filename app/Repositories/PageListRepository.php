<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Sources\SourceType;

class PageListRepository
{
    // ListStorage is abstraction what contains and retrieves pages URLs
    // Can be a file or any database or anything else
    public function __construct(protected ListStorage $storage) {}

    /**
     * @param SourceType $type
     * @return array<int, string>
     */
    public function byType(SourceType $type): array
    {
        // array of URLs
        return $this->storage->for($type)->get();
    }
}
