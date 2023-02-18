<?php
declare(strict_types=1);
namespace App\Sources;

use App\Contracts\Source;
use App\Exception\LogicError;
use App\Fetcher\HttpFetcher;
use App\Sources\Strategies\InstagramPhoto;
use App\Sources\Strategies\InstagramVideo;

class SourceFactory
{

    /**
     * @param SourceType $sourceName
     * @return Source
     * @throws LogicError
     */
    public function create(SourceType $sourceName): Source
    {
        $fetcher = new HttpFetcher(headers: [
            'User-Agent' => 'Tu-95',
        ]);

        return match ($sourceName) {
            SourceType::Instagram =>
                (new InstagramSource(
                    $fetcher,
                    [
                    'url' => 'https://instagram.com/',
                    // etc ...
                    ],
                ))
                    ->addStrategy(new InstagramPhoto)
                    ->addStrategy(new InstagramVideo),

            SourceType::Vkontakte =>
                new VkontakteSource(
                    $fetcher,
                    [
                    // config
                    ],
                ),

            default =>
                throw new LogicError('Unknown source type ' . $sourceName->name),
        };
    }
}
