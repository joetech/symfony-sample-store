<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password_hash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password_plain;

    /**
     * @ORM\Column(type="boolean")
     */
    private $superadmin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shop_name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $remember_token;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $card_brand;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $card_last_four;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $trial_ends_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shop_domain;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_enabled;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $billing_plan;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $trial_starts_at;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="admin_id")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function getPasswordHash(): ?string
    {
        return $this->password_hash;
    }

    public function setPasswordHash(string $password_hash): self
    {
        $this->password_hash = $password_hash;

        return $this;
    }

    public function getPasswordPlain(): ?string
    {
        return $this->password_plain;
    }

    public function setPasswordPlain(string $password_plain): self
    {
        $this->password_plain = $password_plain;

        return $this;
    }

    public function getSuperadmin(): ?bool
    {
        return $this->superadmin;
    }

    public function setSuperadmin(bool $superadmin): self
    {
        $this->superadmin = $superadmin;

        return $this;
    }

    public function getShopName(): ?string
    {
        return $this->shop_name;
    }

    public function setShopName(string $shop_name): self
    {
        $this->shop_name = $shop_name;

        return $this;
    }

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function setRememberToken(?string $remember_token): self
    {
        $this->remember_token = $remember_token;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCardBrand(): ?string
    {
        return $this->card_brand;
    }

    public function setCardBrand(string $card_brand): self
    {
        $this->card_brand = $card_brand;

        return $this;
    }

    public function getCardLastFour(): ?string
    {
        return $this->card_last_four;
    }

    public function setCardLastFour(?string $card_last_four): self
    {
        $this->card_last_four = $card_last_four;

        return $this;
    }

    public function getTrialEndsAt(): ?\DateTimeImmutable
    {
        return $this->trial_ends_at;
    }

    public function setTrialEndsAt(?\DateTimeImmutable $trial_ends_at): self
    {
        $this->trial_ends_at = $trial_ends_at;

        return $this;
    }

    public function getShopDomain(): ?string
    {
        return $this->shop_domain;
    }

    public function setShopDomain(?string $shop_domain): self
    {
        $this->shop_domain = $shop_domain;

        return $this;
    }

    public function getIsEnabled(): ?bool
    {
        return $this->is_enabled;
    }

    public function setIsEnabled(bool $is_enabled): self
    {
        $this->is_enabled = $is_enabled;

        return $this;
    }

    public function getBillingPlan(): ?string
    {
        return $this->billing_plan;
    }

    public function setBillingPlan(string $billing_plan): self
    {
        $this->billing_plan = $billing_plan;

        return $this;
    }

    public function getTrialStartsAt(): ?\DateTimeImmutable
    {
        return $this->trial_starts_at;
    }

    public function setTrialStartsAt(?\DateTimeImmutable $trial_starts_at): self
    {
        $this->trial_starts_at = $trial_starts_at;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setAdminId($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getAdminId() === $this) {
                $product->setAdminId(null);
            }
        }

        return $this;
    }
}
