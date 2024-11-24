<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepositoryImplement implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }


    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }


    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Update user
    public function update(int $id, array $data)
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    // Delete user
    public function delete(int $id)
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
