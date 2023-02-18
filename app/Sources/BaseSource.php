<?php
declare(strict_types=1);
namespace App\Sources;

use App\Contracts\Fetcher;
use App\Contracts\Source;
use App\DTO\MediaData;
use App\Sources\Strategies\Strategy;

abstract class BaseSource implements Source
{
    // Shared source logic here

    /** @var array<int, Strategy> */
    protected array $strategies;

    public function __construct(public Fetcher $fetcher, public array $config)
    {
        // Service init
    }

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
     * @param string $page
     * @return array<int, MediaData>
     */
    public function parseMedia(string $page): array
    {
        $result = [];

        $content = $this->fetcher->fetch($this->config['url']);

        foreach ($this->strategies as $strategy) {
            $result = [
                ...$result,
                ...$strategy->media($content),
                ];
        }

        return $result;
    }
}
