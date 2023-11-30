<?php

declare(strict_types=1);

namespace YouNegotiate\Enums\Traits;

use Illuminate\Support\Str;

trait Names
{
    public function displayName(): string
    {
        /** @var string $name */
        $name = Str::replace('_', ' ', $this->name);

        return Str::title($name);
    }
}
