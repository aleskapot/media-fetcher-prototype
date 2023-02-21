<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Contracts\Fetcher;
use App\Exception\DOMParseException;
use DOMDocument;

class PageRepository
{
    public function __construct(protected Fetcher $fetcher)
    {}

    /**
     * Fetch and returns parsed DOM document object by given URL
     *
     * @param string $url
     * @return DOMDocument
     * @throws DOMParseException
     */
    public function byUrl(string $url): DOMDocument
    {
        $content = $this->fetcher->fetch($url);

        $doc = new DOMDocument();
        if (false === $doc->loadHTML($content)) {
            throw new DOMParseException();
        }
        return $doc;
    }
}
