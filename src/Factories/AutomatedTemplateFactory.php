<?php

declare(strict_types=1);

namespace YouNegotiate\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use YouNegotiate\Enums\AutomatedTemplateType;
use YouNegotiate\Models\AutomatedTemplate;

class AutomatedTemplateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AutomatedTemplate::class;

    public function definition(): array
    {
        return [
            // TODO: We need to decide where we can use the users.
            'user_id' => 1,
            'name' => $this->faker->word(),
            'subject' => $this->faker->sentence(6),
            'type' => $this->faker->randomElement(AutomatedTemplateType::values()),
            'content' => $this->faker->randomHtml(),
            'enabled' => true,
        ];
    }
}
