<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save($data)
    {
        $user = new $this->user;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();
        return $user->fresh();
    }
}
