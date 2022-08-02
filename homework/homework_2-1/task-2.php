<?php

// 1. Описать класс HungryCat. Кот должен иметь следующие свойства: кличку, цвет и любимую еду, которые должны быть проинициализированы в конструкторе.
// 2. Создать и реализовать метод public function eat($food) — внутри этого метода должна выводиться строка такого формата: "Голодный кот <кличка кота>, особые приметы: цвет - <цвет кота>, съел <название еды>". Если кот съел любимую еду, то также нужно вывести строку "и замурчал 'мррррр' от своей любимой еды".
// 3. Создать двух совершенно разных голодных котов и накормить каждого пятью разными блюдами. Оба котика обязательно должны помурчать.

namespace hunger;

class HungryCat 
{
	public $nickname;
	public $color;
	public $eatLove;

	public function __construct($nickname, $color, $eatLove)
	{
		$this->nickname = $nickname;
		$this->color = $color;
		$this->eatLove = $eatLove;	
	}

	public function eat($food) 
	{
		$str = "Голодный кот $this->nickname, особые приметы: цвет - $this->color, съел $food";
		if ($this->eatLove == $food) {
			$str .= " и замурчал 'мррррр' от своей любимой еды";
		}
		return $str;
	}
}

$cat1 = new HungryCat('Рыжик', 'Рыжый', 'Сыр Бри');

echo $cat1->eat('Творог') . "</br>";
echo $cat1->eat('Кашу') . "</br>";
echo $cat1->eat('Сыр Бри') . "</br>";
echo $cat1->eat('Сыр') . "</br>";
echo $cat1->eat('Китикэт') . "</br>";


$cat2 = new HungryCat('Белка', 'Белый', 'Китикэт');

echo $cat2->eat('Творог') . "</br>";
echo $cat2->eat('Кашу') . "</br>";
echo $cat2->eat('Сыр Бри') . "</br>";
echo $cat2->eat('Сыр') . "</br>";
echo $cat2->eat('Китикэт') . "</br>";

