<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PropertyOffer;
use App\Models\PropertyOfferPriceHistory;

class PropertyOfferPriceHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyOfferPriceHistory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'offer_id' => PropertyOffer::factory(),
            'datetime' => $this->faker->dateTime(),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'online' => $this->faker->boolean,
        ];
    }
}
