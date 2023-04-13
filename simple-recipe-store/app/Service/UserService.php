<?php

namespace App\Service;

use App\Models\User;

class UserService
{
  private $userRepository;

  public function __construct() {
    $this->userRepository = new UserRepository();
  }

  public function createUser(string $userName, int $age, string $password): User {
    return $this->userRepository->createUser($userName, $age, $password);
  }
}
