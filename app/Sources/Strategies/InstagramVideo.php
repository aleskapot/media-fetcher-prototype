<?php
declare(strict_types=1);
namespace App\Sources\Strategies;

use App\DTO\MediaData;

class InstagramVideo implements Strategy
{

    /**
     * @param string $content
     * @return array<int, MediaData>
     */
    public function media(string $content): array
    {
        // TODO implement content parse for required media
        return [
            new MediaData('/videos/show.mjpeg', 'video/jpg'),
        ];
    }
}
