<?php 

// Домна – полиморфизм
// Была, кажется, такая игра: в печи нужно было сжигать вещи, и чем лучше это все горит, тем больше дают очков. Нужно сделать небольшую часть этой игры.
// 1. Создать следующие классы:
// •	Forge — печь, должен содержать один метод:
// public function burn($object)
// {
// $flame = $object->burn();
// echo $flame->render((string)$object) . PHP_EOL;
//     };
// •	BlueFlame, RedFlame, Smoke — голубое пламя, красное пламя и дым, должны содержать один метод: public function render($name), возвращающий текст (каждый класс со своим текстом), например, для класса Smoke:
// public function render($name)
// {
// return $name . " лишь задымился";
//     }
// 2. Создать не менее 5 различных классов, которые будут сжигаться в печи. Каждый класс должен реализовывать два метода:
// •	public function burn() — должен возвращать один из объектов: BlueFlame, RedFlame, Smoke — на ваш выбор;
// •	public function __toString() — должен возвращать строку-название текущего объекта.
// 3. Придумать никак не связанные между собой объекты, например, пианино и больная голова, чтобы ощутить именно эффект полиморфизма, а не наследования. :)
// 4. Создать печь и сжечь в ней свои объекты. 
// А затем создать новый класс по той же схеме и насладиться мощью полиморфизма, спалив его экземпляр в печи. :)



// Класс для печи
class Forge
{
	public function burn($object)
	{
		$flame = $object->burn();
		echo $flame->render((string) $object) . PHP_EOL;
	}
}

// Классы для типов огня
class BlueFlame
{
	public function render($name)
	{
		return $name . " сильно полыхает";
	}
}

class RedFlame
{
	public function render($name)
	{
		return $name . " умерено горит";
	}
}

class Smoke
{
	public function render($name)
	{
		return $name . " лишь задымился";
	}
}

// Классы, которые сжигаются в печи
class BurnFirst
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function burn()
	{
		return new BlueFlame();
	}

	public function __toString()
	{
		return $this->name;
	}
}

class BurnSecond
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function burn()
	{
		return new RedFlame();
	}

	public function __toString()
	{
		return $this->name;
	}
}

class BurnThird
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function burn()
	{
		return new Smoke();
	}

	public function __toString()
	{
		return $this->name;
	}
}

$subject1 = new BurnFirst('Пианино');
$subject2 = new BurnSecond('Пакет из под молока');
$subject3 = new BurnThird('Старое полено');

$forge = new Forge();
$forge->burn($subject1);
$forge->burn($subject2);
$forge->burn($subject3);