<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $adminUser = new User();
        $adminUser->setEmail('admin@mail.ru');
        $adminUser->setPassword($this->passwordEncoder->encodePassword($adminUser,'admin123'));
        $adminUser->setRoles(['ROLE_ADMIN']);

        $user = new User();
        $user->setEmail('user@mail.ru');
        $user->setPassword($this->passwordEncoder->encodePassword($adminUser,'user1234'));

        $manager->persist($adminUser);
        $manager->persist($user);
        $manager->flush();
    }
}
