<?php
namespace App\Entity;

use App\Entity\Todo\TaskTrait;

class PlainTask {
    use TaskTrait;

    /**
    * @ORM\Column(type="string", length=1000)
    */
    private $message;

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