<?php

class ToDo
{
  public function __construct(public string $title, public ?string $descritpion, public ?DateTime $done_at)
  {
  }
  public function setDone(): self
  {
    $this->done_at = new DateTime();
    return $this;
  }

  public function unDone(): self
  {
    unset($this->done_at);
    return $this;
  }
}

class ToDoList
{
  public function __construct(public array $todos)
  {
  }
  public function showDone(): array
  {

  }

  public function showToDo(): array
  {

  }

  public function setAllDone(): self
  {
    
  }
}

$todolist = new ToDoList();
