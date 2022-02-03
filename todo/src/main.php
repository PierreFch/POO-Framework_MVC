<?php
require '../vendor/autoload.php';

use Todo\Todo\Todo;
use Todo\Todo\TodoList;

$list = new TodoList(); // Aucuns paramètres car pas de constructeur
$result = $list
    ->addTodo(new Todo("Mission1", "Init composer"))
    ->setAllCompleted()
    ->addTodo(new Todo("Mission2", "Installer var-dumper"))
    ->addTodo(new Todo("Mission3", "Tester le fonctionnement"))
    ->showNotCompleted();

dump("Ma recherche donne :", $list->search("Mission"));