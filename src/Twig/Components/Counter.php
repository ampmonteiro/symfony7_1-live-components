<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Counter
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public int $num = 0;

    #[LiveAction]
    public function up(): void
    {
        $this->num++;
    }

    #[LiveAction]
    public function down(): void
    {
        $this->num--;
    }

    #[LiveAction]
    public function reset(): void
    {
        $this->num = 0;
    }
}
