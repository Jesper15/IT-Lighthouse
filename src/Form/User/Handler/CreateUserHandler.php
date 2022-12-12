<?php

namespace App\Form\User\Handler;

use App\Entity\User;
use App\Form\User\Data\CreateUserData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class CreateUserHandler
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly UserPasswordHasherInterface $hasher
    )
    {}

    public function handle(CreateUserData $data): User
    {
        $user = new User($data->username, $data->email, '__TO_BE_HASHED__', ['ROLE_USER']);
        $plainPassword = $data->password;
        $hashedPassword = $this->hasher->hashPassword(
            $user,
            $plainPassword
        );
        $user->setPassword($hashedPassword);

//        dd($user);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }
}