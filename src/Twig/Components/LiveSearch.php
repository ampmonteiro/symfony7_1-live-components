<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class LiveSearch
{
    use DefaultActionTrait;

    const DATA = [
        'CodeIgniter 4',
        'CakePHP 4',
        'Phalcon',
        'Laravel',
        'Symfony',
        'yii'
    ];


    #[LiveProp(writable: true)]
    public string $query = '';

    // computed prop
    public function getFrameworks(): array
    {
        if (empty($this->query)) {
            return self::DATA;
        }

        return array_filter(
            self::DATA,
            fn($item) => str_contains(
                mb_strtolower($item),
                mb_strtolower($this->query)
            )
        );
    }

    #[LiveAction]
    public function clear(): void
    {
        $this->query = '';
    }
}
