<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => '123123123',
            'email' => $this->faker->unique()->safeEmail,
            'password' =>  Hash::make('123123123'),
            'remember_token' => Str::random(10),
            'phone_number' => '283717216',
            'Admin'=> '1'
        ];
    }
}
