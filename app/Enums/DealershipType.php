<?php

declare(strict_types=1);

namespace App\Enums;

enum DealershipType: string
{
    case INDEPENDENT = 'independent';
    case GROUP = 'group';

    public function label(): string
    {
        return match ($this) {
            self::INDEPENDENT => (string) __('Independent'),
            self::GROUP => (string) __('Group'),
        };
    }
}
