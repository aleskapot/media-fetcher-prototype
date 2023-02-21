<?php
declare(strict_types=1);
namespace App\Sources\Strategies;

use App\DTO\MediaData;
use DOMDocument;

class InstagramVideo implements Strategy
{

    /**
     * @param DOMDocument $document
     * @return array<int, MediaData>
     */
    public function media(DOMDocument $document): array
    {
        // TODO implement content analyze for required media
        return [
            new MediaData('/videos/show.mjpeg', 'video/jpg'),
        ];
    }
}
