<?php
require '../vendor/autoload.php';

use Todo\Todo\Todo;
use Todo\Todo\TodoList;
use function Termwind\{ask};
use function Termwind\{render};

$list = new TodoList(); // Aucuns paramètres car pas de constructeur
/*$result = $list
    ->addTodo(new Todo("Mission1", "Init composer"))
    ->setAllCompleted()
    ->addTodo(new Todo("Mission2", "Installer var-dumper"))
    ->addTodo(new Todo("Mission3", "Tester le fonctionnement"))
    ->showNotCompleted();

dump("Ma recherche donne :", $list->search("Mission2"));*/


$name = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Your username :
    </div>
    HTML
);

while ($name === null) {
  $name = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Your username :
    </div>
    HTML
  );
}
$answer = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Do you want a new todo (Y/n)?
    </div>
    HTML
);
if ($answer === 'n') {
  echo "No add a new todo";
};
while ($answer !== 'n') {
  // Data todo
  $title = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Title :
    </div>
    HTML
  );
  $description = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Description :
    </div>
    HTML
  );

  // Add todo
  $result = $list
      ->addTodo(new Todo($title, $description));

  $result = "<ul>";
  foreach ($list as $todo){
    $result = $result ."<li>". $todo->title ." : ". $todo->description ."</li>";
    return $result . "</ul>";
  }


  // Purchase ?
  $answer = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Do you want a new todo (Y/n)?
    </div>
    HTML
  );
}


/*function askIfNewTodo()
{
  $noAddMessage = "No add a new todo";
  $answer = ask(<<<HTML
    <div class="mt-1 ml-2 mr-1">
        Do you want a new todo (Y/n)?
    </div>
    HTML
  );
  if ($answer === 'n') {
    echo $noAddMessage;
    die();
  };
  return $answer;
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
} */
