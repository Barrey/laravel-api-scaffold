<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function getUserById($id);
    public function deleteUser($id);
    public function createUser(array $userDetails);
    public function updateUser($id, array $newDetails);
}
