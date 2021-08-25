<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class ShopItems
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
     * @ORM\Column(type="integer")
     */
    private $SKU;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=ShopCart::class, mappedBy="ShopItem", orphanRemoval=true)
     */
    private $shopCarts;

    public function __construct()
    {
        $this->shopCarts = new ArrayCollection();
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

    public function getSKU(): ?int
    {
        return $this->SKU;
    }

    public function setSKU(int $SKU): self
    {
        $this->SKU = $SKU;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): self
    {
        $this->stock = $stock;

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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|ShopCart[]
     */
    public function getShopCarts(): Collection
    {
        return $this->shopCarts;
    }

    public function addShopCart(ShopCart $shopCart): self
    {
        if (!$this->shopCarts->contains($shopCart)) {
            $this->shopCarts[] = $shopCart;
            $shopCart->setShopItem($this);
        }

        return $this;
    }

    public function removeShopCart(ShopCart $shopCart): self
    {
        if ($this->shopCarts->removeElement($shopCart)) {
            // set the owning side to null (unless already changed)
            if ($shopCart->getShopItem() === $this) {
                $shopCart->setShopItem(null);
            }
        }

        return $this;
    }
}
