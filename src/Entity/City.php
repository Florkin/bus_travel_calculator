<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=CityGroup::class, mappedBy="cities")
     */
    private $groups;

    /**
     * @ORM\OneToMany(targetEntity=GroupOrder::class, mappedBy="city", orphanRemoval=true)
     */
    private $groupOrders;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->groupOrders = new ArrayCollection();
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

    /**
     * @return Collection|CityGroup[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(CityGroup $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->addCity($this);
        }

        return $this;
    }

    public function removeGroup(CityGroup $group): self
    {
        if ($this->groups->removeElement($group)) {
            $group->removeCity($this);
        }

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
            $groupOrder->setCity($this);
        }

        return $this;
    }

    public function removeGroupOrder(GroupOrder $groupOrder): self
    {
        if ($this->groupOrders->removeElement($groupOrder)) {
            // set the owning side to null (unless already changed)
            if ($groupOrder->getCity() === $this) {
                $groupOrder->setCity(null);
            }
        }

        return $this;
    }
}
