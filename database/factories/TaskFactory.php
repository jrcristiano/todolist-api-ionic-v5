<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $order = 1;

        return [
            'title' => $this->faker->firstName(),
            'description' => $this->faker->text(100),
            'order' => $order++,
            'status' => Task::TODO,
            'user_id' => 1
        ];
    }
}
