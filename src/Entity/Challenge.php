<?php

namespace App\Entity;

use App\Repository\ChallengeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChallengeRepository::class)]
class Challenge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'Challenges', targetEntity: ChallengeUser::class)]
    private Collection $challengeUsers;

    #[ORM\ManyToOne(inversedBy: 'challenges')]
    private ?Round $round = null;

    public function __construct()
    {
        $this->challengeUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, ChallengeUser>
     */
    public function getChallengeUsers(): Collection
    {
        return $this->challengeUsers;
    }

    public function addChallengeUser(ChallengeUser $challengeUser): static
    {
        if (!$this->challengeUsers->contains($challengeUser)) {
            $this->challengeUsers->add($challengeUser);
            $challengeUser->setChallenges($this);
        }

        return $this;
    }

    public function removeChallengeUser(ChallengeUser $challengeUser): static
    {
        if ($this->challengeUsers->removeElement($challengeUser)) {
            // set the owning side to null (unless already changed)
            if ($challengeUser->getChallenges() === $this) {
                $challengeUser->setChallenges(null);
            }
        }

        return $this;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): static
    {
        $this->round = $round;

        return $this;
    }
}
