<?php

namespace App\Entity;

use App\Repository\PathRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PathRepository::class)
 */
class Path
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrival;

    /**
     * @ORM\ManyToMany(targetEntity=City::class)
     */
    private $stops;

    public function __construct()
    {
        $this->stops = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeparture(): ?City
    {
        return $this->departure;
    }

    public function setDeparture(?City $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getArrival(): ?City
    {
        return $this->arrival;
    }

    public function setArrival(?City $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * @return Collection|City[]
     */
    public function getStops(): Collection
    {
        return $this->stops;
    }

    public function addStop(City $stop): self
    {
        if (!$this->stops->contains($stop)) {
            $this->stops[] = $stop;
        }

        return $this;
    }

    public function removeStop(City $stop): self
    {
        $this->stops->removeElement($stop);

        return $this;
    }
}
