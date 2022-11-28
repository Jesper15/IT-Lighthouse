<?php

namespace App\Data;

use Symfony\Component\Validator\Constraints\Length;

final class CreateUserData
{
    public ?string $username;

    public ?string $email;

    #[Length(min: 8)]
    public ?string $password;

    public array $permissions;

    public function __construct()
    {
        $this->username = null;
        $this->email = null;
        $this->permissions = [];
    }
}