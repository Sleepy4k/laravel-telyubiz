<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IUserRepository
{
    /**
     * Get user by unique data
     *
     * @param  string  $uniqueData
     * @param  string  $column
     * @param  array  $returnColumns
     * @return Model|null
     */
    public function getUserByUniqueData(string $uniqueData, string $column, array $returnColumns = ['*']): ?Model;

    /**
    * Register a new user
    *
    * @param  array  $data
    * @return Model|null
    */
    public function registerUser(array $data): ?Model;

    /**
     * Get total number of users
     *
     * @param  array|null  $roles
     * @return int
     */
    public function getTotalUsers(?array $roles = null): int;
}
