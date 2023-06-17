<?php

namespace App\Entity;

use App\Repository\CabinetRowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CabinetRowRepository::class)]
class CabinetRow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'cabinetRows')]
    private ?DataCenter $datacenter = null;

    #[ORM\ManyToOne(inversedBy: 'cabinetRows')]
    private ?Zone $zone = null;

    #[ORM\OneToMany(mappedBy: 'CabinetRow', targetEntity: Cabinet::class)]
    private Collection $cabinets;

    public function __construct()
    {
        $this->cabinets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDatacenter(): ?DataCenter
    {
        return $this->datacenter;
    }

    public function setDatacenter(?DataCenter $datacenter): static
    {
        $this->datacenter = $datacenter;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): static
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return Collection<int, Cabinet>
     */
    public function getCabinets(): Collection
    {
        return $this->cabinets;
    }

    public function addCabinet(Cabinet $cabinet): static
    {
        if (!$this->cabinets->contains($cabinet)) {
            $this->cabinets->add($cabinet);
            $cabinet->setCabinetRow($this);
        }

        return $this;
    }

    public function removeCabinet(Cabinet $cabinet): static
    {
        if ($this->cabinets->removeElement($cabinet)) {
            // set the owning side to null (unless already changed)
            if ($cabinet->getCabinetRow() === $this) {
                $cabinet->setCabinetRow(null);
            }
        }

        return $this;
    }
}
