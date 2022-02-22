<?php

namespace Database\Factories;
use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Result::class;
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'file_name' => $this->faker->title(),
        ];
    }
}
