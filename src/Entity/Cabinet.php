<?php

namespace App\Entity;

use App\Repository\CabinetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CabinetRepository::class)]
class Cabinet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cabinets')]
    private ?DataCenter $datacenter = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Location = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $LocationSortable = null;

    #[ORM\Column(nullable: true)]
    private ?int $AssignedTo = null;

    #[ORM\ManyToOne(inversedBy: 'cabinets')]
    private ?Zone $zone = null;

    #[ORM\Column(nullable: true)]
    private ?int $CabinetHeight = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Model = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Keylock = null;

    #[ORM\Column(nullable: true)]
    private ?int $Maxkw = null;

    #[ORM\Column]
    private ?int $MaxWeight = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $InstallationDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapX1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapX2 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $FrontEdge = null;

    #[ORM\Column]
    private ?int $MapY1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Notes = null;

    #[ORM\Column(length: 10)]
    private ?string $U1Position = null;

    #[ORM\ManyToOne(inversedBy: 'cabinets')]
    private ?CabinetRow $CabinetRow = null;

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

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(?string $Location): static
    {
        $this->Location = $Location;

        return $this;
    }

    public function getLocationSortable(): ?string
    {
        return $this->LocationSortable;
    }

    public function setLocationSortable(?string $LocationSortable): static
    {
        $this->LocationSortable = $LocationSortable;

        return $this;
    }

    public function getAssignedTo(): ?int
    {
        return $this->AssignedTo;
    }

    public function setAssignedTo(?int $AssignedTo): static
    {
        $this->AssignedTo = $AssignedTo;

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

    public function getCabinetHeight(): ?int
    {
        return $this->CabinetHeight;
    }

    public function setCabinetHeight(?int $CabinetHeight): static
    {
        $this->CabinetHeight = $CabinetHeight;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(?string $Model): static
    {
        $this->Model = $Model;

        return $this;
    }

    public function getKeylock(): ?string
    {
        return $this->Keylock;
    }

    public function setKeylock(?string $Keylock): static
    {
        $this->Keylock = $Keylock;

        return $this;
    }

    public function getMaxkw(): ?int
    {
        return $this->Maxkw;
    }

    public function setMaxkw(?int $Maxkw): static
    {
        $this->Maxkw = $Maxkw;
        

        return $this;
    }

    public function getMaxWeight(): ?int
    {
        return $this->MaxWeight;
    }

    public function setMaxWeight(int $MaxWeight): static
    {
        $this->MaxWeight = $MaxWeight;

        return $this;
    }

    public function getInstallationDate(): ?\DateTimeInterface
    {
        return $this->InstallationDate;
    }

    public function setInstallationDate(?\DateTimeInterface $InstallationDate): static
    {
        $this->InstallationDate = $InstallationDate;

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

    public function getFrontEdge(): ?string
    {
        return $this->FrontEdge;
    }

    public function setFrontEdge(?string $FrontEdge): static
    {
        $this->FrontEdge = $FrontEdge;

        return $this;
    }

    public function getMapY1(): ?int
    {
        return $this->MapY1;
    }

    public function setMapY1(int $MapY1): static
    {
        $this->MapY1 = $MapY1;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(?string $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }

    public function getU1Position(): ?string
    {
        return $this->U1Position;
    }

    public function setU1Position(string $U1Position): static
    {
        $this->U1Position = $U1Position;

        return $this;
    }

    public function getCabinetRow(): ?CabinetRow
    {
        return $this->CabinetRow;
    }

    public function setCabinetRow(?CabinetRow $CabinetRow): static
    {
        $this->CabinetRow = $CabinetRow;

        return $this;
    }
}
