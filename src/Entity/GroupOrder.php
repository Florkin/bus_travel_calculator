<?php

namespace App\Entity;

use App\Repository\GroupOrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupOrderRepository::class)
 */
class GroupOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CityGroup::class, inversedBy="groupOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cityGroup;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="groupOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orderValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityGroup(): ?CityGroup
    {
        return $this->cityGroup;
    }

    public function setCityGroup(?CityGroup $cityGroup): self
    {
        $this->cityGroup = $cityGroup;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getOrderValue(): ?int
    {
        return $this->orderValue;
    }

    public function setOrderValue(?int $orderValue): self
    {
        $this->orderValue = $orderValue;

        return $this;
    }
}
