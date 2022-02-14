<?php

namespace Database\Factories\Dashbord;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this -> faker ->name,
            'email' => $this -> faker ->email,
            'password' => $this -> faker ->password,
            'address' => $this -> faker ->address,
            'mobile' => $this -> faker ->mobile,
            'category_id' => $this -> faker ->category_id,
            'active' => $this -> faker ->active
        ];
    }
}
