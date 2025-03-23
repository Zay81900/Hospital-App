<?php

namespace App\Contracts\Services;

interface AuthServiceInterface
{
    /**
     * Register a new user
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function register(array $data);
} 