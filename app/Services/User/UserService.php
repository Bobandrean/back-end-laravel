<?php

namespace App\Services\User;

interface UserService
{
    public function login(string $email, string $password);
    public function register(array $data);  // Make sure this matches
}
