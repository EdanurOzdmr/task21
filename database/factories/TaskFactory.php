<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Task::class;


    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'title'=>$this->faker->title(),
            'description'=>$this->faker->sentence(),
            'status'=>$this->faker->randomElement([Task::TODO, Task::DOING, Task::DONE]),
        ];
    }
}
