<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Level::create([
            "title"=> "المستوي السادس",
            "text"=> "وصف المستوي السادس"
        ]);
        Level::create([
            "title"=> "المستوي السابع",
            "text"=> "وصف المستوي السابع"
        ]);
        Level::create([
            "title"=> "المستوي الثامن",
            "text"=> "وصف المستوي الثامن"
        ]);
        return [
            "title"=> "المستوي التاسع",
            "text"=> "وصف المستوي التاسع"
        ];
    }
}
