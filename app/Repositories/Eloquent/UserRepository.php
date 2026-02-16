<?php

namespace App\Repositories\Eloquent;

use App\Facades\System;
use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements IUserRepository
{
    /** Store model instance */
    protected Model $model;

    /**
     * Base respository constructor.
     *
     * @param Model $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Get user by unique data.
     */
    public function getUserByUniqueData(string $uniqueData, string $column, array $returnColumns = ['*']): ?Model
    {
        $user = $this->model
            ->query()
            ->select($returnColumns)
            ->where($column, $uniqueData)
            ->first();

        return $user ? $user : null;
    }

    /**
     * Register a new user.
     */
    public function registerUser(array $data): ?Model
    {
        try {
            return $this->model
                ->query()
                ->create([
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'phone'    => $data['phone'],
                    'password' => $data['password'],
                ]);
        } catch (Exception $e) {
            System::error('Failed to register new user', ['error' => $e->getMessage()]);

            return null;
        }
    }

    /**
     * Get total number of users.
     */
    public function getTotalUsers(?array $roles = null): int
    {
        return $this->model
            ->query()
            ->when(!is_null($roles) && is_array($roles) && !empty($roles), static fn($q) => $q->role($roles))
            ->count();
    }
}
