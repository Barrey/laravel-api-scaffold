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
    protected static $permissionIndex = 0;
    protected static $permissions = [];

    public function definition(): array
    {
        $availablePermissions = [
            'post' => ['Create', 'Read', 'Update', 'Delete'],
            'user' => ['Create', 'Read', 'Update', 'Delete'],
            'role' => ['Create', 'Read', 'Update', 'Delete'],
            'permission' => ['Create', 'Read', 'Update', 'Delete']
        ];

        if (empty(self::$permissions)) {
            foreach ($availablePermissions as $resource => $actions) {
                foreach ($actions as $action) {
                    self::$permissions[] = [
                        'name' => "$action $resource",
                        'slug' => strtolower($action) . '.' . strtolower($resource),
                        'description' => 'This permission allows a user to ' . strtolower($action) . ' a ' . $resource,
                    ];
                }
            }
        }

        $permission = self::$permissions[self::$permissionIndex];
        self::$permissionIndex = (self::$permissionIndex + 1) % count(self::$permissions);

        return [
            'id' => Str::uuid(),
            'name' => $permission['name'],
            'slug' => $permission['slug'],
            'description' => $permission['description'],
            'is_active' => true
        ];
    }
}
