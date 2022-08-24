<?php 

namespace App;

abstract class Item
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function show()
	{
		echo 'Я ' . $this->name . PHP_EOL;
	}
}

class EmptyItem extends Item 
{
	public function show()
	{
		echo 'Класс ' . $this->name . ' не найден' . PHP_EOL;
	}
}

class Car extends Item{};
class Men extends Item{};
class Door extends Item{};
class Ball extends Item{};
class Phone extends Item{};

class Creator
{
	public static function create($name)
	{
		if (!class_exists($name)) {
			return new EmptyItem($name);
		} else {
			return new $name($name);
		}
	}
}