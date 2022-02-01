<?php

class Todo
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

  public array $todos;

  // Afficher les todos terminées
  public function showCompleted(): array
  {
    array_filter($this->todos, function(Todo $todo){
      return $todo->isCompleted();
    });
  }

  // Afficher les todos en cours
  public function showNotCompleted(): array
  {
    array_filter($todos, function(Todo $todo){
      return $todo->unCompleted();
    });
  }

  // Valider toutes les todos
  public function setAllCompleted(): self
  {

  }

  // Ajouter une todo
  public function addTodo(array $todo): self
  {
    $this->todos[]=$todo; // Comme array_push mais plus performant
  }
}

$todos = [];


