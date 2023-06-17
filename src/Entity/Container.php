<?php

namespace App\Entity;

use App\Repository\ContainerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContainerRepository::class)]
class Container
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $ParentID = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DrawingFileName = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapX = null;

    #[ORM\Column(nullable: true)]
    private ?int $MapY = null;

    #[ORM\OneToMany(mappedBy: 'container', targetEntity: DataCenter::class, orphanRemoval: true)]
    private Collection $dataCenters;

    public function __construct()
    {
        $this->dataCenters = new ArrayCollection();
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

    public function getParentID(): ?int
    {
        return $this->ParentID;
    }

    public function setParentID(?int $ParentID): static
    {
        $this->ParentID = $ParentID;

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

    /**
     * @return Collection<int, DataCenter>
     */
    public function getDataCenters(): Collection
    {
        return $this->dataCenters;
    }

    public function addDataCenter(DataCenter $dataCenter): static
    {
        if (!$this->dataCenters->contains($dataCenter)) {
            $this->dataCenters->add($dataCenter);
            $dataCenter->setContainer($this);
        }

        return $this;
    }

    public function removeDataCenter(DataCenter $dataCenter): static
    {
        if ($this->dataCenters->removeElement($dataCenter)) {
            // set the owning side to null (unless already changed)
            if ($dataCenter->getContainer() === $this) {
                $dataCenter->setContainer(null);
            }
        }

        return $this;
    }
}
