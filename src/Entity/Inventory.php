<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventoryRepository::class)
 */
class Inventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="inventory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="inventory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price_cents;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sale_price_cents;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cost_cents;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sku;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $length;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    public function setProductId(Product $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getAdminId(): ?Product
    {
        return $this->admin_id;
    }

    public function setAdminId(Product $admin_id): self
    {
        $this->admin_id = $admin_id;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPriceCents(): ?int
    {
        return $this->price_cents;
    }

    public function getPriceDollars(): ?float
    {
        return (float) ($this->price_cents / 100);
    }

    public function setPriceCents(int $price_cents): self
    {
        $this->price_cents = $price_cents;

        return $this;
    }

    public function getSalePriceCents(): ?int
    {
        return $this->sale_price_cents;
    }

    public function setSalePriceCents(int $sale_price_cents): self
    {
        $this->sale_price_cents = $sale_price_cents;

        return $this;
    }

    public function getCostCents(): ?int
    {
        return $this->cost_cents;
    }

    public function getCostDollars(): ?float
    {
        return (float) ($this->cost_cents / 100);
    }

    public function setCostCents(int $cost_cents): self
    {
        $this->cost_cents = $cost_cents;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

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

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }
}
