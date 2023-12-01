<?php

namespace YouNegotiate\Enums;

enum CommunicationStatusTriggerType: int
{
    case AUTOMATIC = 1;
    case SCHEDULED = 2;
    case BOTH = 3;

    /**
     * Gets the Enum by value, if it exists.
     */
    public static function tryFromValue(int $value): ?static
    {
        $cases = array_filter(self::cases(), fn ($case): bool => $case->value === $value);

        return array_values($cases)[0] ?? null;
    }

    public function getBadgeClass(): string
    {
        return match ($this) {
            self::AUTOMATIC => 'badge bg-success text-white',
            self::SCHEDULED => 'badge bg-info text-white',
            self::BOTH => 'badge bg-secondary text-white',
        };
    }
}
