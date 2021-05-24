<?php

namespace App\Todo;

class TodoTask
{

    private string $title;

    private string $message;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): string
    {
        $this->title = $title;
        return $this->title;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): string
    {
        $this->message = $message;
        return $this->message;
    }
}
