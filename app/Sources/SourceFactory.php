<?php
declare(strict_types=1);
namespace App\Sources;

use App\Contracts\Source;
use App\Exception\BadLogicException;
use App\Fetcher\HttpFetcher;

class SourceFactory
{

    /**
     * @param SourceType $sourceName
     * @return Source
     * @throws BadLogicException
     */
    public function create(SourceType $sourceName): Source
    {
        $fetcher = new HttpFetcher(headers: [
            'User-Agent' => 'Tu-95',
        ]);

        return match ($sourceName) {
            SourceType::Instagram =>
            (new InstagramSourceBuilder([
                'url' => 'https://instagram.com/',
                // etc ...
            ]))->make(),

            default =>
                throw new BadLogicException('Unknown source type ' . $sourceName->name),
        };
    }
}
