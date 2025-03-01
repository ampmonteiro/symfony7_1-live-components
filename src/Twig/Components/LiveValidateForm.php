<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;

use Symfony\Component\Validator\Constraints as Assert;

#[AsLiveComponent]
final class LiveValidateForm
{
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[LiveProp(writable: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 5)]
    public string $task = '';

    #[LiveProp(writable: true)]
    #[Assert\NotBlank]
    #[Assert\Positive]
    public ?int $relevance = null;

    #[LiveProp(writable: true)]
    public array $taskList = [];


    #[LiveAction]
    public function create(): void
    {

        $this->validate();

        $this->taskList[] = [
            'name' => $this->task,
            'relevance' => $this->relevance
        ];

        $this->task = '';
        $this->relevance = null;
    }
}
