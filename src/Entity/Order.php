<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="orders")
     */
    private $product_id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $street_address;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $apartment;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country_code;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $order_status;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $payment_ref;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transaction_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $payment_amt_cents;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ship_charged_cents;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ship_cost_cents;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $subtotal_cents;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $total_cents;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $shipper_name;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $payment_date;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $shipped_date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tracking_number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tax_total_cents;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    public function __construct()
    {
        $this->product_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductId(): Collection
    {
        return $this->product_id;
    }

    public function addProductId(Product $productId): self
    {
        if (!$this->product_id->contains($productId)) {
            $this->product_id[] = $productId;
        }

        return $this;
    }

    public function removeProductId(Product $productId): self
    {
        $this->product_id->removeElement($productId);

        return $this;
    }

    public function getStreetAddress(): ?string
    {
        return $this->street_address;
    }

    public function setStreetAddress(string $street_address): self
    {
        $this->street_address = $street_address;

        return $this;
    }

    public function getApartment(): ?string
    {
        return $this->apartment;
    }

    public function setApartment(?string $apartment): self
    {
        $this->apartment = $apartment;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    public function setCountryCode(string $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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

    public function getOrderStatus(): ?string
    {
        return $this->order_status;
    }

    public function setOrderStatus(string $order_status): self
    {
        $this->order_status = $order_status;

        return $this;
    }

    public function getPaymentRef(): ?string
    {
        return $this->payment_ref;
    }

    public function setPaymentRef(?string $payment_ref): self
    {
        $this->payment_ref = $payment_ref;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transaction_id;
    }

    public function setTransactionId(?string $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    public function getPaymentAmtCents(): ?int
    {
        return $this->payment_amt_cents;
    }

    public function setPaymentAmtCents(int $payment_amt_cents): self
    {
        $this->payment_amt_cents = $payment_amt_cents;

        return $this;
    }

    public function getShipChargedCents(): ?int
    {
        return $this->ship_charged_cents;
    }

    public function setShipChargedCents(int $ship_charged_cents): self
    {
        $this->ship_charged_cents = $ship_charged_cents;

        return $this;
    }

    public function getShipCostCents(): ?int
    {
        return $this->ship_cost_cents;
    }

    public function setShipCostCents(int $ship_cost_cents): self
    {
        $this->ship_cost_cents = $ship_cost_cents;

        return $this;
    }

    public function getSubtotalCents(): ?int
    {
        return $this->subtotal_cents;
    }

    public function setSubtotalCents(int $subtotal_cents): self
    {
        $this->subtotal_cents = $subtotal_cents;

        return $this;
    }

    public function getTotalCents(): ?int
    {
        return $this->total_cents;
    }

    public function setTotalCents(int $total_cents): self
    {
        $this->total_cents = $total_cents;

        return $this;
    }

    public function getShipperName(): ?string
    {
        return $this->shipper_name;
    }

    public function setShipperName(string $shipper_name): self
    {
        $this->shipper_name = $shipper_name;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeImmutable
    {
        return $this->payment_date;
    }

    public function setPaymentDate(\DateTimeImmutable $payment_date): self
    {
        $this->payment_date = $payment_date;

        return $this;
    }

    public function getShippedDate(): ?\DateTimeImmutable
    {
        return $this->shipped_date;
    }

    public function setShippedDate(\DateTimeImmutable $shipped_date): self
    {
        $this->shipped_date = $shipped_date;

        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->tracking_number;
    }

    public function setTrackingNumber(string $tracking_number): self
    {
        $this->tracking_number = $tracking_number;

        return $this;
    }

    public function getTaxTotalCents(): ?int
    {
        return $this->tax_total_cents;
    }

    public function setTaxTotalCents(int $tax_total_cents): self
    {
        $this->tax_total_cents = $tax_total_cents;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
