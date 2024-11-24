<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class UserServiceImplement implements UserService
{
  protected $mainRepository;

  public function __construct(UserRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  /**
   * Handle user login and return a JWT token
   *
   * @param  string $email
   * @param  string $password
   * @return string|null
   */
  public function login(string $email, string $password)
  {
    // Retrieve the user using the repository
    $user = $this->mainRepository->findByEmail($email);

    // Check if user exists
    if (!$user) {
      return response()->json(['error' => 'User not found'], 404);
    }

    // Verify password
    if (!Hash::check($password, $user->password)) {
      return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // Create the token
    $token = JWTAuth::fromUser($user);

    return response()->json(['token' => $token], 200);
  }

  // Handle user registration
  public function register(array $data)
  {
    // Hash the password
    $data['password'] = Hash::make($data['password']);

    // Call repository to create the user
    $user = $this->mainRepository->create($data);

    // Optionally, create a JWT token after registration
    // $token = JWTAuth::fromUser($user); // If you want to return a token
    // return response()->json(['user' => $user, 'token' => $token]);

    return response()->json(['user' => $user], 201); // Return created user details
  }
}
