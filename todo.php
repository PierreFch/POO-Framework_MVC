<?php

class ToDo
{

  private ?DateTime $completed_at = null;

  public function __construct(public string $title, public ?string $descritpion)
  {
  }
  public function isCompleted(): self
  {
    $this->completed_at = new DateTime();
    return $this;
  }

  public function unCompleted(): bool
  {
    return $this->completed_at !== null;
  }
}

class ToDoList
{
  public function __construct(public array $todos)
  {
  }
  // Afficher les todos terminées
  public function showCompleted(): array
  {
  }

  // Afficher les todos en cours
  public function showNotCompleted(): array
  {
  }

  // Valider toutes les todos
  public function setAllCompleted(): self
  {
  }

  // Ajouter une todo
  public function addTodo(array $todo): self
  {

  }
}

$maToDo = new ToDo(title: "Ma todo list", descritpion: "Woaw c'est magique !",);

