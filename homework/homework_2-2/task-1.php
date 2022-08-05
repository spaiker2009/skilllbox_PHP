<?php 

// 1. Описать следующие классы:
// •	Cow — Коровка;
// •	Pig — Хрюшка;
// •	Chicken — Курица;
// •	Farm — Ферма.
// Ферма должна содержать свойство public $animals — массив с животными, а также метод public function addAnimal(Animal $animal), который добавит животное на ферму.
// Каждое животное умеет говорить public function say() и ходить public function walk()
// 2. Создать и реализовать эти методы: 
// •	метод say() — должен выводить голос каждого животного;
// •	метод walk() — должен выводить "топ-топ" для каждого из животных.
// При заселении на ферму животное должно пойти.
// 3. Создать метод перекличка на ферме public function rollCall(), в котором каждое животное на ферме покажет свой голос в случайном порядке.
// 4. Создать класс — абстракцию для данной задачи. Следует обратить внимание на условие в этой задаче — волей-неволей эта абстракция в явном виде присутствует в условии задачи.
// 5. Вынести как можно больше функционала в абстракцию, а реализации сделать наследниками этой абстракции.
// 6. Поселить корову, двух хрюшек и курицу на ферму. Провести их перекличку.


abstract class Animal
{
	abstract public function say();

	public function walk()
	{
		return "топ-топ";
	}
}

class Cow extends Animal
{
	public $name = 'Коровка';

	public function say()
	{
		return "Мууууу";
	}
}

class Pig extends Animal
{
	public $name = 'Хрюшка';

	public function say()
	{
		return "хрю-хрю";
	}
}

class Chicken extends Animal
{
	public $name = 'Курица';

	public function say()
	{
		return "Ку-ка-ре-ку";
	}
}

class Farm
{
	private $animals = [];

	public function addAnimals(Animal $animal)
	{
		$this->animals[] = $animal;
		echo 'Животное (' . $animal->name . ') заселили, его действия: ' . $animal->walk() . '<br/>'; // При замелении на ферму животное наинает идти
	}

	// Все животные на ферме показывают свой голос в случайном порядке
	public function rollCall() {
		shuffle($this->animals);
		echo "Перекличка животных: <br/>";
		foreach ($this->animals as $value) {
			echo $value->name . ' подает голос: ' . $value->say() . '<br/>';
		}
	}
}

$farm = new Farm();

$animal1 = new Cow();
$animal2 = new Pig();
$animal3 = new Pig();
$animal4 = new Chicken();

$farm->addAnimals($animal1);
$farm->addAnimals($animal2);
$farm->addAnimals($animal3);
$farm->addAnimals($animal4);


$farm->rollCall();