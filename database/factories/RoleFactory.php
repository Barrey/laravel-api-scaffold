<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $availableRoles = ['admin', 'user', 'editor', 'author', 'contributor', 'finance contributor'];

        // random but unique role
        $role = $this->faker->unique()->randomElement($availableRoles);

        return [
            'id' => Str::uuid(),
            'name' => $role,
            'slug' => Str::slug($role),
            'description' => $this->faker->sentence(),
            'is_active' => true
        ];
    }
}
