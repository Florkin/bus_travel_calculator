<?php

namespace App\Entity;

use App\Repository\CityGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 */
class CityGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=City::class, inversedBy="groups")
     */
    private $cities;

    /**
     * @ORM\OneToMany(targetEntity=GroupOrder::class, mappedBy="cityGroup", orphanRemoval=true)
     */
    private $groupOrders;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->groupOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|City[]
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        $this->cities->removeElement($city);

        return $this;
    }

    /**
     * @return Collection|GroupOrder[]
     */
    public function getGroupOrders(): Collection
    {
        return $this->groupOrders;
    }

    public function addGroupOrder(GroupOrder $groupOrder): self
    {
        if (!$this->groupOrders->contains($groupOrder)) {
            $this->groupOrders[] = $groupOrder;
            $groupOrder->setCityGroup($this);
        }

        return $this;
    }

    public function removeGroupOrder(GroupOrder $groupOrder): self
    {
        if ($this->groupOrders->removeElement($groupOrder)) {
            // set the owning side to null (unless already changed)
            if ($groupOrder->getCityGroup() === $this) {
                $groupOrder->setCityGroup(null);
            }
        }

        return $this;
    }
}
