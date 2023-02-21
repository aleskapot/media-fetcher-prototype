<?php
declare(strict_types=1);

use App\Contracts\Fetcher;

class DownloadMedia
{
    public function __construct(
        protected Fetcher $fetcher,
        protected MediaStorage $storage     // abstraction for storing downloaded media (filesystem, s3, db, etc)
    ) {}

    /**
     * @param array<int, string> $mediaURLs
     * @return void
     */
    public function handle(array $mediaURLs): void
    {
        foreach ($mediaURLs as $media) {
            $data = $this->fetcher->fetch($media);
            $this->storage->save($data);
        }
    }
}
