<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IUserRepository
{
    /**
     * Get user by unique data
     */
    public function getUserByUniqueData(string $uniqueData, string $column, array $returnColumns = ['*']): ?Model;

    /**
     * Register a new user
     */
    public function registerUser(array $data): ?Model;

    /**
     * Get total number of users
     */
    public function getTotalUsers(?array $roles = null): int;
}
