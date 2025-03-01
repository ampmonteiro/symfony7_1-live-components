<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;


#[AsLiveComponent]
final class LiveSimpleForm
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $task      = '';

    #[LiveProp(writable: true)]
    public ?int $relevance = null;

    #[LiveProp(writable: true)]
    public array $taskList = [];


    #[LiveAction]
    public function create(): void
    {
        $this->taskList[] = [
            'name' => $this->task,
            'relevance' => $this->relevance
        ];

        $this->task = '';
        $this->relevance = null;
    }
}
