<?php

namespace YouNegotiate\Enums\Traits;

trait SelectionBox
{
    use Names;

    public static function displaySelectionBox(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($case): array => [
            $case->value => $case->displayName(),
        ])->toArray();
    }
}
