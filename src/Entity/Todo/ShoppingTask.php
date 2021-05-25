<?php
namespace App\Entity\Todo;

use App\Repository\ShoppingTaskRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Todo\TaskTrait;

/**
 * @ORM\Entity(repositoryClass=ShoppingTaskRepository::class)
 */
class ShoppingTask {
    use TaskTrait;


    /**
     * @ORM\Column(name="products", type="array", nullable=true)
     */
    private array $products = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $type = "ShoppingTask";
    

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): self
    {
        $this->products = $products;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
}