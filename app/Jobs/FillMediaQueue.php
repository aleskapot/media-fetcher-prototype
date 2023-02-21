<?php
declare(strict_types=1);

use App\Contracts\Source;
use App\Repositories\PageListRepository;

class FillMediaQueue
{
    public function __construct(protected PageListRepository $urls) {}


    /**
     * Parses media sources for interested media and make a queue as array of media URLs
     *
     * @return array<int, string>
     */
    public function handle(): array
    {
        $sources = [
            (new \App\Sources\InstagramSourceBuilder([]))->make(),
            // all other sources
        ];

        $result = [];
        foreach ($sources as $source) {
            /** @var Source $source */
            $result = [
                ...$result,
                ...array_map(
                    fn (string $url) => $source->parseMedia($url),
                    $this->urls->byType($source->getType())
                ),
            ];
        }
        return $result;
    }
}
