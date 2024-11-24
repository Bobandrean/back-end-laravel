<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User\UserServiceImplement;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceImplement $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle user login and return JWT token
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Call service method to login user
        return $this->userService->login($request->email, $request->password);
    }

    public function profile(Request $request)
    {
        // Return the authenticated user's details
        return response()->json($request->user());
    }

    // Register user
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6', // assuming you want password confirmation
        ]);

        // Call service method to register user
        return $this->userService->register($request->only('name', 'email', 'password'));
    }

    public function logout(Request $request)
    {
        // Revoke the user's token
        auth()->logout();

        return response()->json(['message' => 'User logged out successfully']);
    }
}
