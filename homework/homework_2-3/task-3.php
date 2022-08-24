<?php 

// 1. Создать классы:
// •	Рыба;
// •	Тигр;
// •	Медведь;
// •	Лось;
// •	Змея;
// •	Курица;
// •	Верблюд;
// •	Слон;
// •	Дельфин.
// 2. Придумать для указанных животных два уровня абстракции: базовый уровень — Animal — животное. Уровни абстракции должны быть абстрактными классами.
// 3. Правильно расставить наследование в созданных классах. Класс Animal должен содержать абстрактный метод move(). Все животные должны реализовать метод move(), который выводит, каким образом передвигается указанное животное.

namespace worldAnimals;

abstract class Animal
{
	abstract protected function move();

	public function getMove(){
		return $this->move();
	}
}

abstract class Say extends Animal 
{
	abstract protected function say();
}

class Fish extends Say
{
	protected function move()
	{
		return 'Плавает';
	}
	protected function say()
	{
		return 'Хочу кушать';
	}
}

class Tiger extends Say
{
	protected function move()
	{
		return 'Бегает';
	}
	protected function say()
	{
		return 'Рррр';
	}
}

class Bear extends Say
{
	protected function move()
	{
		return 'Ходит';
	}
	protected function say()
	{
		return 'Руууу';
	}
}

class Elk extends Say
{
	protected function move()
	{
		return 'Бегает';
	}
	protected function say()
	{
		return 'Уууу';
	}
}

class Snake extends Say
{
	protected function move()
	{
		return 'Ползает';
	}
	protected function say()
	{
		return 'Шшшшш';
	}
}

$fish = new Fish();
echo $fish->getMove();