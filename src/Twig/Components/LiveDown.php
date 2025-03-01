<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class LiveDown
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $md = '';

    #[LiveAction]
    public function clear(): void
    {
        $this->md = '';
    }
}
