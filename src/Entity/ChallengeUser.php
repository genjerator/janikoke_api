<?php

namespace App\Entity;

use App\Repository\ChallengeUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChallengeUserRepository::class)]
class ChallengeUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'challengeUsers')]
    private ?User $Users = null;

    #[ORM\ManyToOne(inversedBy: 'challengeUsers')]
    private ?Challenge $Challenges = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsers(): ?User
    {
        return $this->Users;
    }

    public function setUsers(?User $Users): static
    {
        $this->Users = $Users;

        return $this;
    }

    public function getChallenges(): ?Challenge
    {
        return $this->Challenges;
    }

    public function setChallenges(?Challenge $Challenges): static
    {
        $this->Challenges = $Challenges;

        return $this;
    }
}
