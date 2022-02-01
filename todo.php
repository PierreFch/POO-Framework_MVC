<?php

class Todo
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
  public array $todos = [];

  // Ajouter une todo
  public function addTodo(Todo $todo): self
  {
    $this->todos[] = $todo; // Comme array_push mais plus performant
    return $this;
  }

  // Afficher les todos terminées
  public function showCompleted(): array
  {
    // array_filter($this->todos, function (Todo $todo) {     // Paramètres : Prendre chaque élément de l'array
    //   return $todo->isCompleted();
    // });
    return array_filter($this->todos, fn (Todo $todo) => $todo->isCompleted()); // TRUE
  }

  // Afficher les todos en cours
  public function showNotCompleted(): array
  {
    return array_filter($this->todos, fn (Todo $todo) => !$todo->isCompleted()); // FALSE
  }

  // Valider toutes les todos
  public function setAllCompleted(): self // Self correspond à ToDoList
  {
    foreach($this->todos as $todo){
      $todo->setCompleted();
    }
    return $this;
  }
}

$list = new ToDoList(); // Aucuns paramètres car pas de constructeur
$result = $list
  ->addTodo(new Todo("Ma tâche numéro 1", "01-02-2022"))
  ->addTodo(new Todo("Ma tâche numéro 2", "10-02-2022"))
  -> setAllCompleted()
  ->addTodo(new Todo("Ma tâche numéro 3", "25-02-2022"))
  -> showNotCompleted();

var_dump($result);
