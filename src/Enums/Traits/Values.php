<?php

declare(strict_types=1);

namespace YouNegotiate\Enums\Traits;

trait Values
{
    /**
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
