<?php

namespace App\Repositories\User;

interface UserRepository
{
    // Method to find a user by email
    public function findByEmail(string $email);

    // Method to create a new user
    public function create(array $data);

    // Add other methods you want to implement like update, delete etc.
    public function update(int $id, array $data);
    public function delete(int $id);
}
