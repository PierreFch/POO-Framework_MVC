<?php
require '../vendor/autoload.php';

use Todo\Todo\Todo;
use Todo\Todo\TodoList;
use function Termwind\{ask, render};


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

function askName(): string
{
  $name = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Your username :
    </div>
    HTML
  );
  if(!$name){
    return askName();
  }
  return $name;
}

function askTitle(): string
{
  $title = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Title :
    </div>
    HTML
  );
  if(!$title){
    return askTitle();
  }
  return $title;
}

function askDescription(): string
{
  $description = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Description :
    </div>
    HTML
  );
  if(!$description){
    return askDescription();
  }
  return $description;
}

$name = askName();
$purchase = askIfNewTodo();
$list = new TodoList();

while ($purchase !== 'n') {
  $title = askTitle();
  $description = askDescription();

  $list->addTodo(new Todo($title, $description));
  $result = "<ul>";
  foreach ($list->todos as $todo){
    $result = $result . "<li>" . $todo->title . " : " . $todo->description . "</li>";
  }
  $result = $result . "</ul>";
  render($result);

  $purchase = askIfNewTodo();
}