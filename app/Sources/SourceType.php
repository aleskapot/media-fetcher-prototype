<?php
declare(strict_types=1);
namespace App\Sources;

enum SourceType
{
    case Instagram;
    case Vkontakte;
    case SomeService;
}
