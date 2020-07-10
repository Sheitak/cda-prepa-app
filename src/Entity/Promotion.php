<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacity;

    /**
     * @ORM\OneToMany(targetEntity=Learner::class, mappedBy="promotion")
     */
    private $learners;

    public function __construct() {
        $this->learners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @return Collection|Learner[]
     */
    public function getLearners(): Collection
    {
        return $this->learners;
    }

    /**
    * param Learner $learner
    * @return Promotion
    */
    public function addLearner(Learner $learner): self
    {
        if (!$this->learners->contains($learner)) {
            $this->learners[] = $learner;
            $learner->setPromotion($this);
        }

        return $this;
  }

    /**
     * @param Learner $learner
     * @return Promotion
     */

    public function removeLearner(Learner $learner): self
    {
        if ($this->learners->contains($learner)) {
                  $this->learners->removeElement($learner);
                  // set the owning side to null (unless already changed)
                  if ($learner->getPromotion() === $this) {
                      $learner->setPromotion(null);
                  }
         }

         return $this;
    }
}
