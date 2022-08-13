<?php 

// 1. Создать класс Cat — кот. У кота должно быть три свойства: имя, цвет, возраст. Все они должны
// быть инициализированы в конструкторе.
// 2. Создать класс CatFactory — этот класс будет создавать котов с помощью именованных
// конструкторов, например:
// public static function createBlack8YearsOldCat($name)
// {
// return new Cat($name, "black", 8);
// }
// Следует обратить внимание на то, что название конструктора фабрики должно точно совпасть с параметрами создаваемого кота.
// 3. Создать еще 6 различных статичных конструкторов в фабрике, каждый из которых будет создавать котов с разными параметрами. Должны быть конструкторы, которые
// предустанавливают только 1 параметр, например createBlackCat (какие здесь
// параметры по вашему мнению?). При создании кота все свойства должны быть проинициализированы значениями.
// 4. Создать массив котов, заполнить его, используя все созданные конструкторы, и вывести на
// экран (например функцией print_r()).

namespace factoryCat;

class Cat
{
	private $name;
	private $color;
	private $age;

	public function __construct($name, $color = '', $age = '')
	{
		$this->name = $name;
		$this->color = $color;
		$this->age = $age;
	}
}

class CatFactory
{
	public static function createBlack8YearsOldCat($name)
	{
		return new Cat($name, "black", 8);
	}

	public static function createBlack6YearsOldCat($name)
	{
		return new Cat($name, "black", 6);
	}

	public static function create4YearsOldCat($name)
	{
		return new Cat($name, "", 4);
	}

	public static function createWhiteCat($name)
	{
		return new Cat($name, "white");
	}

	public static function createWhite6YearsOldCat($name)
	{
		return new Cat($name, "white", 6);
	}

	public static function createWhite4YearsOldCat($name)
	{
		return new Cat($name, "white", 4);
	}

	public static function createWhite2YearsOldCat($name)
	{
		return new Cat($name, "white", 2);
	}
}

$cats = [
	CatFactory::createBlack8YearsOldCat('Рыжик'),
	CatFactory::createBlack6YearsOldCat('Белка'),
	CatFactory::create4YearsOldCat('Васька'),
	CatFactory::createWhiteCat('Беломорик'),
	CatFactory::createWhite6YearsOldCat('Мурка'),
	CatFactory::createWhite4YearsOldCat('Соник'),
	CatFactory::createWhite2YearsOldCat('Чуня'),
];

echo "<pre>";
print_r($cats);
echo "</pre>";