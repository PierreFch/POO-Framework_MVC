<?php

namespace Todo\Todo;

class TodoList
{
  public array $todos = [];

  // Ajouter une todo
  public function addTodo(Todo $todo): self
  {
    $this->todos[] = $todo; // Comme array_push mais plus performant
    return $this;
  }

  // Filtrer les todos
  public function filter(callable $filterFunction): array
  {
    return array_filter($this->todos, $filterFunction);
  }

  // Chercher une todo
  public function search(string $search): array
  {
    return $this->filter(fn(Todo $todo) => str_contains($todo->title . $todo->description, $search));
  }

  // Afficher les todos terminées
  public function showCompleted(): array
  {
    return $this->filter(fn(Todo $todo) => $todo->isCompleted());
  }

  // Afficher les todos en cours
  public function showNotCompleted(): array
  {
    return $this->filter(fn(Todo $todo) => !$todo->isCompleted());
  }

  // Valider toutes les todos
  public function setAllCompleted(): self // Self correspond à TodoList
  {
    foreach ($this->todos as $todo) {
      $todo->setCompleted();
    }
    return $this;
  }
}