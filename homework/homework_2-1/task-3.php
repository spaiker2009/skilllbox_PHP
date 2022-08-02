<?php
// 1. Описать два класса: 
// ToyFactory — Фабрика Игрушек.
// Toy — игрушка, у каждой игрушки есть название и цена, которые должны быть проинициализированы в конструкторе.
// 2. Реализовать метод создания игрушки на фабрике public function createToy($name), который должен возвращать новый экземпляр игрушки со случайной ценой.
// 3. Создать случайное количество игрушек (воспользуйтесь функцией rand(int min, int max)): не менее 5 и не более 20 шт. Названия игрушек могут повторяться, но должны встречаться игрушки с разными названиями (не обязательно проверять, чтобы среди созданных игрушек в одном процессе выполнения программы обязательно присутствовали разные игрушки).
// 4. Вывести на экран построчно строки: <Название игрушки> — <Стоимость игрушки>.
// 5. Выведите на экран строку Итого — <Сумма стоимостей всех игрушек>.

namespace factory;

/**
 * Функция, которая возвращает случайный элемент массива
 * @param array
 * @return значение элемента массива string
 */
function elemArray(array $array) : string {
	$amount = count($array);
	$randomNumber = rand(0, $amount - 1);
	return $array[$randomNumber];
}

$toys = [
	'Барби',
	'Черепашка',
	'Электромашинка',
	'Кораблик',
	'Мишка'
];

class ToyFactory
{
	public static function createToy($name) {
		return new Toy ($name, rand(100, 1500));
	}
}

class Toy
{
	public $name;
	public $price;

	public function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}	
}

$sum = 0;

for ($i = 0; $i <= rand(5, 20); $i++) { 
	$toy = ToyFactory::createToy(elemArray($toys));
	$sum += $toy->price;
	echo $toy->name . ' - ' . $toy->price . '</br>';
}
echo "Итого - $sum";