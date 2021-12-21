<?php

namespace Database\Factories\Agent;

use App\Models\Agent\Agent;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{

    protected $model = Agent::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            '_key'=>Str::random(32),
            'name'=>$this->faker->name,
            'division'=>$this->faker->word,
            'district'=>$this->faker->word,
            'address'=>$this->faker->address,
            'information'=>$this->faker->paragraph(5),
        ];
    }
}

