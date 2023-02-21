<?php
declare(strict_types=1);
namespace App\Sources;

use App\Contracts\Source;
use App\DTO\MediaData;
use App\Exception\DOMParseException;
use App\Repositories\PageRepository;
use App\Sources\Strategies\Strategy;

abstract class BaseSource implements Source
{
    // Shared source logic here

    protected SourceType $type;

    /** @var array<int, Strategy> */
    protected array $strategies;

    public function __construct(
        protected PageRepository $page,
        protected array $config
    ) {}

    /**
     * @param Strategy $strategy
     * @return Source
     */
    public function addStrategy(Strategy $strategy): Source
    {
        $this->strategies[] = $strategy;
        return $this;
    }

    /**
     * @param string $url
     * @return array<int, MediaData>
     * @throws DOMParseException
     */
    public function parseMedia(string $url): array
    {
        $document = $this->page->byUrl($url);

        $result = [];
        foreach ($this->strategies as $strategy) {
            $result = [
                ...$result,
                ...$strategy->media($document),
                ];
        }

        return $result;
    }

    /**
     * @return SourceType
     */
    public function getType(): SourceType
    {
        return $this->type;
    }
}
