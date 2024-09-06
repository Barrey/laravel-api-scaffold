<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Sequence;

use function Psy\debug;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $availablePermissions = ['post' => ['create', 'read', 'update', 'delete'], 'user' => ['create', 'read', 'update', 'delete'], 'role' => ['create', 'read', 'update', 'delete'], 'permission' => ['create', 'read', 'update', 'delete']];

        // transform availablePermissions to array which contains value like 'post.create', 'post.read', etc
        $transformedPermissions = [];
        foreach ($availablePermissions as $key => $value) {
            foreach ($value as $val) {
                $transformedPermissions[] = $key . '.' . $val;
            }
        }

        $permission = $this->faker->randomElement($transformedPermissions);

        return [
            'id' => Str::uuid(),
            'name' => $permission,
            'slug' => $permission,
            'description' => $this->faker->sentence(),
            'is_active' => true
        ];
    }
}
