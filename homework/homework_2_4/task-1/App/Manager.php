<?php 

// Все на своих местах
// 1. Создать класс Manager — он будет расставлять объекты по местам, класс содержит только один метод place($item):
// •	если в этот метод передан объект типа Бумажный, то метод должен вывести строку:
// ‘Положил <Имя класса> на стол’
// •	если в этот метод передан объект типа Инструмент, то метод должен вывести строку:
// ‘Убрал <Имя класса> внутрь стола’
// •	если в этот метод передано что-то другое, то метод должен вывести строку:
// ‘Выкинул <Имя класса, если объект, либо переданное значение> в корзину’
// •	внутри <> нужно подставить то, что требуется, например: ‘Положил Document на стол’
// 2. Создать два абстрактных класса Papers (Бумажный) и Instrument (Инструмент).
// 3. Создать Менеджера и передать ему не менее 5 различных $item’ов так, чтобы хотя бы по
// одному разу было выведено каждое из сообщений.

namespace App;

class Manager
{
	public function place($item)
	{
		if ($item instanceof Papers) {
			echo 'Положил ' . Papers::class . ' на стол' . PHP_EOL;
		} elseif ($item instanceof Instrument) {
			echo 'Убрал ' . Instrument::class . ' внутрь стола' . PHP_EOL;
		} else {
			echo 'Выкинул ' . $this->getValue($item) . ' в корзину' . PHP_EOL;
		}
	}

	private function getValue($item)
	{
		if (is_object($item)) {
			return get_class($item);
		} else {
			return $item;
		}
	}

}

abstract class Papers{}
abstract class Instrument{}

class Book extends Papers{}
class Saw extends Instrument{}
class OtherClass{}