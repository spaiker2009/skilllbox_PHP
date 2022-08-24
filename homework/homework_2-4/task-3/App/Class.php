<?php 

namespace App;

interface Renderable
{
	public function render($string);
}

interface Formatter 
{
	public function format($string);
}

class Display
{
	public static function show($formatter, $string)
	{
		if ($formatter instanceof \App\Renderable) {
			$formatter->render($string);
		} elseif ($formatter instanceof \App\Formatter) {
			$formatter->format($string);
		} elseif (!($formatter instanceof \App\Formatter) && method_exists($formatter, 'format')) {
			$formatter->format($string);
		} else {
			echo '<br/>' . $string . '<br/>' . PHP_EOL;
		}
	}
}

class Conclusion implements Renderable
{
	public function render($string)
	{
		$string = 'Прошла рендер ' . $string;
		echo '<br/>' . $string . '<br/>' . PHP_EOL;
	}
}

class Uppercase implements Formatter 
{
	public function format($string)
	{
		echo '<br/>' . mb_strtoupper($string) . '<br/>' . PHP_EOL;
	}
}

class AddCopyright 
{
	public function format($string)
	{
		echo '<br/>' . $string . ' (Произведено в Китае) <br/>' . PHP_EOL;
	}
}

class StandartString{}