<?php 

// Добавить к созданным в предыдущем задании следующие классы:
// •	Goose — Гусь;
// •	Turkey — Индюк;
// •	Horse — Лошадь;
// •	BirdFarm — Птичья ферма;
// •	Farmer — фермер.
// Теперь у вас есть две фермы: одна будет для птиц, другая для животных с копытцами (hoof).
// 7. Создать дополнительные уровни абстракции для животных (копытные и птицы). При этом птицы при ходьбе должны пытаться взлететь, а не топать, как другие животные. У них должен быть метод function tryToFly(), который выводит "Вжих-вжих-топ-топ". 
// 8. Скорректировать наследования всех животных на более точные, и реализовать недостающие методы.
// На птицеферме у нас строгий учет свободных мест, поэтому сразу после заселения туда новой птицы, Ферма должна сообщать суммарное количество птиц на ней. Для этого необходимо добавить метод function showAnimalsCount(), выводящий на экран "Птиц на ферме: <кол-во птиц>".
// 9. За расселение животных и учет на фермах теперь частично отвечает фермер. Добавить фермеру методы:
// •	function addAnimal(Farm $farm, Animal $animal) — метод должен заселить на ферму животное;
// •	function rollCall(Farm $farm) — метод должен вызывать перекличку на ферме.
// 10. Создать объекты: фермер, ферма, птицеферма.
// 11. Создать в указанном порядке и приказать фермеру заселить следующих животных: корову, 2-х хрюшек, курицу, 3-х индеек, двух лошадок и гуся. После этого заставьте лентяя-фермера устроить перекличку всех животных на обеих фермах.


abstract class Animal
{
	abstract public function say();
	abstract public function walk();
}

abstract class AnimalHoof extends Animal
{
	public function walk()
	{
		return "топ-топ";
	}
}


abstract class AnimalBird extends Animal
{
	public function walk()
	{
		return $this->tryToFly();
	}

	public function tryToFly(){
		return "Вжих-вжих-топ-топ";
	}
}

class Cow extends AnimalHoof
{
	public $name = 'Коровка';

	public function say()
	{
		return "Мууууу";
	}
}

class Pig extends AnimalHoof
{
	public $name = 'Хрюшка';

	public function say()
	{
		return "хрю-хрю";
	}
}

class Chicken extends AnimalBird
{
	public $name = 'Курица';

	public function say()
	{
		return "Ку-ка-ре-ку";
	}
}

class Goose extends AnimalBird
{
	public $name = 'Гусь';

	public function say()
	{
		return "Га-га-га";
	}
}

class Turkey extends AnimalBird
{
	public $name = 'Индюк';

	public function say()
	{
		return "О-ло-ло-ло";
	}
}

class Horse extends AnimalHoof
{
	public $name = 'Лошадь';

	public function say()
	{
		return "И-го-го-го";
	}
}


class Farm
{
	protected $animals = [];

	public function addAnimals(Animal $animal)
	{
		$this->animals[] = $animal;
		echo 'Животное (' . $animal->name . ') заселили, его действия: ' . $animal->walk() . '<br/>'; // При заселении на ферму животное начинает идти
	}

	// Все животные на ферме показывают свой голос в случайном порядке
	public function rollCall() 
	{
		shuffle($this->animals);
		echo "Перекличка животных: <br/>";
		foreach ($this->animals as $value) {
			echo $value->name . ' подает голос: ' . $value->say() . '<br/>';
		}
	}
}

class BirdFarm extends Farm
{
	public function addAnimals(Animal $animal)
	{
		parent::addAnimals($animal);
		echo $this->showAnimalsCount();
	}

	function showAnimalsCount() {
		return "Птиц на ферме: " . count($this->animals) . "<br/>";
	}
}

class Farmer
{
	public function addAnimal(Farm $farm, Animal $animal) 
	{
		$farm->addAnimals($animal);
	}

	public function rollCall(Farm $farm)
	{
		$farm->rollCall();
	}
}

$farm = new Farm();
$birdFarm = new BirdFarm();
$farmer = new Farmer();

$farmer->addAnimal($farm, new Cow());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($birdFarm, new Chicken());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($birdFarm, new Goose());

$farmer->rollCall($farm);
$farmer->rollCall($birdFarm);
