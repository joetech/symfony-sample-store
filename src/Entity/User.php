<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Repository\InventoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
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
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_enabled;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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

    /**
     * @ORM\OneToMany(targetEntity=Inventory::class, mappedBy="admin_id")
     */
    private $inventory;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->inventory = new ArrayCollection();
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
     * @return Collection|Inventory[]
     */
    public function getInventory(): Collection
    {
        return $this->inventory;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
