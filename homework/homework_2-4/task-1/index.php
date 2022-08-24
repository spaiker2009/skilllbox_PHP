<?php 

include_once('App/Manager.php');

$manager = new App\Manager();

$manager->place(new App\Book());
$manager->place(new App\Saw());
$manager->place(new App\OtherClass());
$manager->place('test');
$manager->place(123);