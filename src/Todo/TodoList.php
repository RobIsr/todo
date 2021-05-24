<?php
namespace App\Todo;

class TodoList {
    private array $todoItems;

    public function getTodoItems(): array
    {
        return $this->todoItems;
    }

    public function addTodoItem(): int
    {
        //TODO: Functionallity to add a task.
    }

    public function removeTodoItem(): int
    {
        //TODO: Functionallity to remove a task
    }
}