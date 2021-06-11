<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Community::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random(1)->first->id,
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(2000),
            'image' => "https://picsum.photos/400/400"
        ];
    }
}
