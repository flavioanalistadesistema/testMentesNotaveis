<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;
use InvalidArgumentException;

class UserService
{
    /**
     * @var $userRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function saveUserData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->userRepository->save($data);

        return $result;
    }
}
