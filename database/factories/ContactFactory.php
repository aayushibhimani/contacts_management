<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=> $this->faker->firstName,
            'middle_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'email'=>$this->faker->email,
            'mobile'=>$this->faker->numerify('##########'),
            'landline'=>$this->faker->numerify('########'),
            'notes'=>$this->faker->paragraphs(rand(2,4),true),
            'image'=>'contacts/user.png',
            'created_at'=>Carbon::now()->format('Y-m-d')
        ];
    }
}
