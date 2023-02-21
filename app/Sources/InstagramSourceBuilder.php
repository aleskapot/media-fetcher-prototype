<?php
declare(strict_types=1);

namespace App\Sources;

use App\Contracts\Fetcher;
use App\Contracts\Source;
use App\Fetcher\HttpFetcher;
use App\Repositories\PageRepository;
use App\Sources\Strategies\Strategy;

class InstagramSourceBuilder
{
    protected ?Fetcher $fetcher;

    public function __construct(protected array $config)
    {}

    protected function strategies(): array
    {
        // TODO read from config file for strategies
        return [
            \App\Sources\Strategies\InstagramPhoto::class,
            \App\Sources\Strategies\InstagramVideo::class,
        ];
    }

    public function withFetcher(Fetcher $fetcher): self
    {
        $this->fetcher = $fetcher;
        return $this;
    }

    /**
     * @return Source
     */
    public function make(): Source
    {
        // create default fetcher
        if (!$this->fetcher) {
            $this->fetcher = new HttpFetcher(headers: [
                'User-Agent' => 'Tu-95',
            ]);
        }

        $source = new InstagramSource(new PageRepository($this->fetcher), $this->config);

        foreach ($this->strategies() as $strategyClass) {
            /** @var Strategy $strategy */
            $strategy = new $strategyClass;
            $source->addStrategy($strategy);
        }
        return $source;
    }
}
