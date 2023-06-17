<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZoneRepository::class)]
class Zone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'zones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataCenter $datacenter = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapX1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapX2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapY1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapY2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapZoom = null;

    #[ORM\OneToMany(mappedBy: 'zone', targetEntity: CabinetRow::class)]
    private Collection $cabinetRows;

    #[ORM\OneToMany(mappedBy: 'zone', targetEntity: Cabinet::class)]
    private Collection $cabinets;

    public function __construct()
    {
        $this->cabinetRows = new ArrayCollection();
        $this->cabinets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getMapX1(): ?int
    {
        return $this->MapX1;
    }

    public function setMapX1(?int $MapX1): static
    {
        $this->MapX1 = $MapX1;

        return $this;
    }

    public function getMapX2(): ?int
    {
        return $this->MapX2;
    }

    public function setMapX2(?int $MapX2): static
    {
        $this->MapX2 = $MapX2;

        return $this;
    }

    public function getMapY1(): ?int
    {
        return $this->MapY1;
    }

    public function setMapY1(?int $MapY1): static
    {
        $this->MapY1 = $MapY1;

        return $this;
    }

    public function getMapY2(): ?int
    {
        return $this->MapY2;
    }

    public function setMapY2(?int $MapY2): static
    {
        $this->MapY2 = $MapY2;

        return $this;
    }

    public function getMapZoom(): ?int
    {
        return $this->MapZoom;
    }

    public function setMapZoom(?int $MapZoom): static
    {
        $this->MapZoom = $MapZoom;

        return $this;
    }

    /**
     * @return Collection<int, CabinetRow>
     */
    public function getCabinetRows(): Collection
    {
        return $this->cabinetRows;
    }

    public function addCabinetRow(CabinetRow $cabinetRow): static
    {
        if (!$this->cabinetRows->contains($cabinetRow)) {
            $this->cabinetRows->add($cabinetRow);
            $cabinetRow->setZone($this);
        }

        return $this;
    }

    public function removeCabinetRow(CabinetRow $cabinetRow): static
    {
        if ($this->cabinetRows->removeElement($cabinetRow)) {
            // set the owning side to null (unless already changed)
            if ($cabinetRow->getZone() === $this) {
                $cabinetRow->setZone(null);
            }
        }

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
            $cabinet->setZone($this);
        }

        return $this;
    }

    public function removeCabinet(Cabinet $cabinet): static
    {
        if ($this->cabinets->removeElement($cabinet)) {
            // set the owning side to null (unless already changed)
            if ($cabinet->getZone() === $this) {
                $cabinet->setZone(null);
            }
        }

        return $this;
    }
}
