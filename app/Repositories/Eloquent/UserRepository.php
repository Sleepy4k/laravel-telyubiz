<?php

namespace App\Repositories\Eloquent;

use App\Facades\System;
use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements IUserRepository
{
    /**
     * Store model instance
     * @var Model
     */
    protected Model $model;

    /**
     * Base respository constructor
     *
     * @param  Model  $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Get user by unique data
     *
     * @param  string  $uniqueData
     * @param  string  $column
     * @param  array  $returnColumns
     * @return Model|null
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
     * Register a new user
     *
     * @param  array  $data
     * @return Model|null
     */
    public function registerUser(array $data): ?Model
    {
        try {
            return $this->model
                ->query()
                ->create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => $data['password'],
                ]);
        } catch (\Exception $e) {
            System::error('Failed to register new user', ['error' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Get total number of users
     *
     * @param  array|null  $roles
     * @return int
     */
    public function getTotalUsers(?array $roles = null): int
    {
        return $this->model
            ->query()
            ->when(!is_null($roles) && is_array($roles) && !empty($roles), function ($q) use ($roles) {
                return $q->role($roles);
            })
            ->count();
    }
}
