<?php

namespace App\Entity;

use App\Repository\ShipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=ShipRepository::class)
 * @Vich\Uploadable
 */
class Ship
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $premium;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="ships")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Size::class, inversedBy="ships")
     */
    private $size;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="ships")
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $length;

    /**
     * @ORM\Column(type="float")
     */
    private $beam;

    /**
     * @ORM\Column(type="float")
     */
    private $height;

    /**
     * @ORM\Column(type="float")
     */
    private $mass;

    /**
     * @ORM\Column(type="float")
     */
    private $cargoCap;

    /**
     * @ORM\Column(type="float")
     */
    private $scmSpeed;

    /**
     * @ORM\Column(type="float")
     */
    private $afterburnSpeed;

    /**
     * @ORM\Column(type="float")
     */
    private $minCrew;

    /**
     * @ORM\Column(type="float")
     */
    private $maxCrew;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shipView;

    /**
     * @Vich\UploadableField(mapping="ship_view", fileNameProperty="shipView")
     * @var File
     */
    private $shipViewFile;

    /**
     * @ORM\OneToMany(targetEntity=ShipImages::class, mappedBy="ship", cascade={"persist", "remove"})
     */
    private $shipImages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->shipImage = new ArrayCollection();
        $this->shipImages = new ArrayCollection();
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

    public function getPremium(): ?bool
    {
        return $this->premium;
    }

    public function setPremium(bool $premium): self
    {
        $this->premium = $premium;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getSize(): ?Size
    {
        return $this->size;
    }

    public function setSize(?Size $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getBeam(): ?float
    {
        return $this->beam;
    }

    public function setBeam(float $beam): self
    {
        $this->beam = $beam;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): ?float
    {
        return $this->mass;
    }

    public function setMass(float $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getCargoCap(): ?float
    {
        return $this->cargoCap;
    }

    public function setCargoCap(float $cargoCap): self
    {
        $this->cargoCap = $cargoCap;

        return $this;
    }

    public function getScmSpeed(): ?float
    {
        return $this->scmSpeed;
    }

    public function setScmSpeed(float $scmSpeed): self
    {
        $this->scmSpeed = $scmSpeed;

        return $this;
    }

    public function getAfterburnSpeed(): ?float
    {
        return $this->afterburnSpeed;
    }

    public function setAfterburnSpeed(float $afterburnSpeed): self
    {
        $this->afterburnSpeed = $afterburnSpeed;

        return $this;
    }

    public function getMinCrew(): ?float
    {
        return $this->minCrew;
    }

    public function setMinCrew(float $minCrew): self
    {
        $this->minCrew = $minCrew;

        return $this;
    }

    public function getMaxCrew(): ?float
    {
        return $this->maxCrew;
    }

    public function setMaxCrew(float $maxCrew): self
    {
        $this->maxCrew = $maxCrew;

        return $this;
    }

    public function getShipView(): ?string
    {
        return $this->shipView;
    }

    public function setShipView(?string $shipView): self
    {
        $this->shipView = $shipView;

        return $this;
    }

    public function getShipViewFile()
    {
        return $this->shipViewFile;
    }

    public function setShipViewFile(File $shipView = null)
    {
        $this->shipViewFile = $shipView;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be calles and the file is lost
        if ($shipView) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->createdAt  = new \DateTime('now');
        }
    }

    /**
     * @return Collection<int, ShipImages>
     */
    public function getShipImages(): Collection
    {
        return $this->shipImages;
    }

    public function addShipImage(ShipImages $shipImage): self
    {
        if (!$this->shipImages->contains($shipImage)) {
            $this->shipImages[] = $shipImage;
            $shipImage->setShip($this);
        }

        return $this;
    }

    public function removeShipImage(ShipImages $shipImage): self
    {
        if ($this->shipImages->removeElement($shipImage)) {
            // set the owning side to null (unless already changed)
            if ($shipImage->getShip() === $this) {
                $shipImage->setShip(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}