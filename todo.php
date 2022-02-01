<?php

class ToDo
{

  private ?DateTime $completed_at = null;

  public function __construct(public string $title, public ?string $descritpion)
  {
  }
  public function setCompleted(): self
  {
    $this->completed_at = new DateTime();
    return $this;
  }

  public function isCompleted(): bool
  {
    return $this->completed_at !== null;
  }
}

class ToDoList
{
  public function __construct(public Todo $todos)
  {
  }
  public function showDone(): Todo
  {
    $array = new Todo();
    return $array;
  }

  public function showToDo(): Todo
  {

  }

  public function setAllDone(): self
  {

  }

  public function addTodo(Todo $todo): self
  {

  }
}

$maToDo = new ToDo(
  title: "Ma todo list",
  descritpion: "Woaw c'est magique !",
);
