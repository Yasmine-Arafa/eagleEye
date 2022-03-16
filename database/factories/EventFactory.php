<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Event;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model=Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        for ($x = 0; $x <= 2; $x++) {
            $frames[]=$faker->imageUrl($width = 200, $height = 200);
        }
        return [

  

            //'frames'=> implode("|", ['php', 'javascript', 'vue']),
            'frames' => implode("|", $frames),
            //'frames' => $faker->imageUrl($width = 200, $height = 200, $count=3),
            'frames_no' => '3',
            'happened_at' => now(),
        ];
    }
}
