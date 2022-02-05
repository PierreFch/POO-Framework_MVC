<?php
require '../vendor/autoload.php';

// use Todo\Todo\Todo;
use Todo\Todo\TodoList;
use function Termwind\{ask};

$list = new TodoList();

$name = null;
while ($name === null) {
  $name = askName();
}

$purchase = askIfNewTodo();
while ($purchase !== 'n') {
  $title = askTitle();
  $description = askDescription();
  $result = "<ul>";

  foreach ($list as $todo){
    $result = $result . "<li>" . $todo->title . " : " . $todo->description . "</li>";
    var_dump($todo);
    echo $result . "</ul>";
  }

  $purchase = askIfNewTodo();
}

// Declaration des fonctions
function askIfNewTodo()
{
  $noAddMessage = "No add a new todo";
  $purchase = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Do you want a new todo (Y/n)?
    </div>
    HTML
  );
  if ($purchase === 'n') {
    echo $noAddMessage;
    die();
  }
  return $purchase;
}

function askName(): ?string
{
  return ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Your username :
    </div>
    HTML
  );
}

function askTitle(): ?string
{
  return ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Title :
    </div>
    HTML
  );
}

function askDescription(): ?string
{
  return ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Description :
    </div>
    HTML
  );
}
