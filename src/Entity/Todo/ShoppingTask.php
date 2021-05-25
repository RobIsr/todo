<?php
namespace App\Entity\Todo;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Todo\TaskTrait;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class ShoppingTask {
    use TaskTrait;
}