<?php 

namespace zoo;

class Cat
{
	public $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
}

class Dog
{
	public $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
}

class Fish
{
	public $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
}

//Создаем котиков
$cat1 = new Cat('Рыжик');
$cat2 = new Cat('Барсик');
$cat3 = new Cat('Белочка');

// Выводим имена котиков
echo $cat1->name;
echo $cat2->name;
echo $cat3->name;

// Создаем собачек
$dog1 = new Dog('Марта');
$dog2 = new Dog('Джарик');
$dog3 = new Dog('Муму');
$dog4 = new Dog('Гавка');
$dog5 = new Dog('Бобик');

// Выводим имена собачек
echo $dog1->name;
echo $dog2->name;
echo $dog3->name;
echo $dog4->name;
echo $dog5->name;

// Создаем рыбку
$fish1 = new Fish('Лучик');

// Выводим имя рыбки
echo $fish1->name;