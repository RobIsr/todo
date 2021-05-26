<?php

namespace App\Entity\Todo;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Todo\TaskTrait;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class PlainTask
{
    use TaskTrait;

    /**
    * @ORM\Column(type="string", length=1000)
    */
    private $message;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $type = "PlainTask";

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
