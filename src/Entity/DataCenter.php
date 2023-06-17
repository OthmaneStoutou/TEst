<?php

namespace App\Entity;

use App\Repository\DataCenterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataCenterRepository::class)]
class DataCenter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $SquareFootage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DeliveryAddress = null;

    #[ORM\Column(length: 80, nullable: true)]
    private ?string $Administrator = null;

    #[ORM\Column(nullable: true)]
    private ?int $MaxkW = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DrawingFileName = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $EntryLogging = null;

    #[ORM\ManyToOne(inversedBy: 'dataCenters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Container $container = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapX = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapY = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $U1Position = null;

    #[ORM\OneToMany(mappedBy: 'datacenter', targetEntity: Zone::class)]
    private Collection $zones;

    #[ORM\OneToMany(mappedBy: 'datacenter', targetEntity: CabinetRow::class)]
    private Collection $cabinetRows;

    #[ORM\OneToMany(mappedBy: 'datacenter', targetEntity: Cabinet::class)]
    private Collection $cabinets;

    public function __construct()
    {
        $this->zones = new ArrayCollection();
        $this->cabinetRows = new ArrayCollection();
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

    public function getSquareFootage(): ?int
    {
        return $this->SquareFootage;
    }

    public function setSquareFootage(int $SquareFootage): static
    {
        $this->SquareFootage = $SquareFootage;

        return $this;
    }

    public function getDeliveryAddress(): ?string
    {
        return $this->DeliveryAddress;
    }

    public function setDeliveryAddress(?string $DeliveryAddress): static
    {
        $this->DeliveryAddress = $DeliveryAddress;

        return $this;
    }

    public function getAdministrator(): ?string
    {
        return $this->Administrator;
    }

    public function setAdministrator(?string $Administrator): static
    {
        $this->Administrator = $Administrator;

        return $this;
    }

    public function getMaxkW(): ?int
    {
        return $this->MaxkW;
    }

    public function setMaxkW(?int $MaxkW): static
    {
        $this->MaxkW = $MaxkW;

        return $this;
    }

    public function getDrawingFileName(): ?string
    {
        return $this->DrawingFileName;
    }

    public function setDrawingFileName(?string $DrawingFileName): static
    {
        $this->DrawingFileName = $DrawingFileName;

        return $this;
    }

    public function getEntryLogging(): ?int
    {
        return $this->EntryLogging;
    }

    public function setEntryLogging(?int $EntryLogging): static
    {
        $this->EntryLogging = $EntryLogging;

        return $this;
    }

    public function getContainer(): ?Container
    {
        return $this->container;
    }

    public function setContainer(?Container $container): static
    {
        $this->container = $container;

        return $this;
    }

    public function getMapX(): ?int
    {
        return $this->MapX;
    }

    public function setMapX(?int $MapX): static
    {
        $this->MapX = $MapX;

        return $this;
    }

    public function getMapY(): ?int
    {
        return $this->MapY;
    }

    public function setMapY(?int $MapY): static
    {
        $this->MapY = $MapY;

        return $this;
    }

    public function getU1Position(): ?string
    {
        return $this->U1Position;
    }

    public function setU1Position(?string $U1Position): static
    {
        $this->U1Position = $U1Position;

        return $this;
    }

    /**
     * @return Collection<int, Zone>
     */
    public function getZones(): Collection
    {
        return $this->zones;
    }

    public function addZone(Zone $zone): static
    {
        if (!$this->zones->contains($zone)) {
            $this->zones->add($zone);
            $zone->setDatacenter($this);
        }

        return $this;
    }

    public function removeZone(Zone $zone): static
    {
        if ($this->zones->removeElement($zone)) {
            // set the owning side to null (unless already changed)
            if ($zone->getDatacenter() === $this) {
                $zone->setDatacenter(null);
            }
        }

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
            $cabinetRow->setDatacenter($this);
        }

        return $this;
    }

    public function removeCabinetRow(CabinetRow $cabinetRow): static
    {
        if ($this->cabinetRows->removeElement($cabinetRow)) {
            // set the owning side to null (unless already changed)
            if ($cabinetRow->getDatacenter() === $this) {
                $cabinetRow->setDatacenter(null);
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
            $cabinet->setDatacenter($this);
        }

        return $this;
    }

    public function removeCabinet(Cabinet $cabinet): static
    {
        if ($this->cabinets->removeElement($cabinet)) {
            // set the owning side to null (unless already changed)
            if ($cabinet->getDatacenter() === $this) {
                $cabinet->setDatacenter(null);
            }
        }

        return $this;
    }
}
