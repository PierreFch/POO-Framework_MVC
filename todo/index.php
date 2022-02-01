<?php
require_once ('class/Todo.php');
require_once('class/TodoList.php');

$list = new TodoList(); // Aucuns paramètres car pas de constructeur
$result = $list
    ->addTodo(new Todo("Titre1", "Créer les classes"))
    ->setAllCompleted()
    ->addTodo(new Todo("Titre2", "Créer les methodes"))
    ->addTodo(new Todo("Titre3", "Tester le fonctionnement"))
    ->showNotCompleted();

var_dump($result);

var_dump("Ma recherche donne :", $list->search("methodes"));