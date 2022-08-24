<?php 

// Форматированный вывод
// 1. Создать интерфейсы:
// •	Renderable с одним публичным методом render($string);
// •	Formatter с одним публичным методом format($string);
// 2. Создать класс Display, содержащий один метод: public static function show($formatter, $string).
// Принцип работы этого метода:
// •	если $formatter — объект, реализующий интерфейс Renderable, то у этого объекта просто вызывается метод render;
// •	если $formatter — объект, реализующий интерфейс Formatter, то выводится результат
// вызова метода format;
// •	если $formatter — объект, не реализующий интерфейс Formatter, но имеет метод format, то выводится результат вызова метода format.
// •	В другом случае строка $string выводится так, как есть.
// 3. Придумать свои реализации для каждого из случаев. 
// 4. Создать массив из строк, создать массив из этих объектов и вывести каждую строку каждым
// из возможных форматов.

include_once('App/Class.php');

$objects = [new App\Conclusion(), new App\Uppercase(), new App\AddCopyright(), new App\StandartString()];
$strings = ['Строчка 1', 'Строчка 2', 'Строчка 3', 'Строчка 4'];

foreach ($objects as $object) {
	foreach ($strings as $string) {
		echo App\Display::show($object, $string);
	}
}

