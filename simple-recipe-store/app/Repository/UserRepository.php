<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
  public function createUser(string $userName, int $age, string $password): User {
      return User::create([
        'name' => $userName,
        'email' => $age,
        'password' => Hash::make($password),
    ]);
  }

  public function updateUser(int $userId, string $userName, int $age, string $password): User {
    $user = User::find($userId);
    return $user->update([
      'name' => $userName,
      'email' => $age,
      'password' => Hash::make($password),
  ]);
}
}
