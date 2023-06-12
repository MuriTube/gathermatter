<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Hier definieren Sie die Standardeigenschaften für Ihre Tickets
            'eventID' => Event::all()->random()->id,
            'price' => $this->faker->randomFloat(2, 10, 100), // Beispielsweise ein zufälliger Preis zwischen 10 und 100
            'tier' => $this->faker->randomElement(['normal', 'VIP', 'premium']), // Beispielsweise eine zufällige Stufe
            'description' => $this->faker->sentence, // Eine zufällige Beschreibung
        ];
    }
}
