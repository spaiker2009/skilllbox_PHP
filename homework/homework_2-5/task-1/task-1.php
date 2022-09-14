<?php 

// Ленивый калькулятор

// 1. Создать класс Calculator, содержащий только один метод public static function
// calculate($number1, $number2, callable $callback). Метод должен возвращать результат
// вычисления для чисел, при этом сам ничего не считая.
// 2. Создать массив $callbacks, содержащий 4 различных вида значений для типа callable
// (повторяться не должны, например, может быть только одна анонимная функция и т.п.). Каждый
// из этих callable должен выполнять одно из 4 математических операций (сложение, вычитание,
// умножение, деление).
// 3. Создать несколько пар чисел и вывести результат каждой из математической операции,
// используя Calculator::calculate().
// 4. Пример выполнения программы:
// Пара чисел: 5 10
// 15
// -5
// 50
// 0.5

$numbers = [
	[8, 2],
	[5, 10]
];

// Анонимная функция для сложения
$calcPlus = function($number1, $number2)
{
	echo '<p>Складываем число ' . $number1 . ' и число ' . $number2 . '</p>';
	echo 'Результат: ';
	return $number1 + $number2;
};

// Основной класс, который имеет статитческую функцию calculate()
class Calculator
{
	public static function calculate($number1, $number2, callable $callback)
	{
		return $callback($number1, $number2);
	}
}

// Массив с анонимными функциями, которые отвечают за вычисление
$callbacks = [
	function($number1, $number2) {
		echo '<p>Вычитаем число ' . $number1 . ' из числа ' . $number2 . '</p>';
		echo 'Результат: ';
		return $number1 - $number2;
	},
	$calcPlus,
	[Multiplication::class, 'formula'],
	[new Division(), 'formula']
];

// Класс для умножения
class Multiplication
{
	public static function formula($number1, $number2)
	{
		echo '<p>Умножаем число ' . $number1 . ' на число ' . $number2 . '</p>';
		echo 'Результат: ';
		return $number1 * $number2;
	}
}

// Класс для деления
class Division
{
	public function formula($number1, $number2)
	{
		echo '<p>Делим число ' . $number1 . ' на число ' . $number2 . '</p>';
		echo 'Результат: ';
		return $number1 / $number2;
	}
}

// Получаем результат
for ($j = 0; $j < count($numbers); $j++) { 
	for ($i = 0; $i < count($callbacks); $i++) { 
		echo Calculator::calculate($numbers[$j][0], $numbers[$j][1], $callbacks[$i]);
	}
}
