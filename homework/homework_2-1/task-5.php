<?php 

// 1. Описать классы:
// •	Order — Заказ, должен содержать корзину;
// •	Basket — Корзина, должен содержать массив товаров с указанием количества каждого;
// •	Product — Товар: у каждого товара есть название и цена, которые должны быть проинициализированы в конструкторе.
// Класс Order должен содержать два метода:
// •	getBasket() — возвращает корзину заказа;
// •	getPrice() — возвращает общую стоимость заказа.
// Класс Basket должен содержать следующие методы:
// •	addProduct(Product $product, $quantity) — добавляет товар в корзину;
// •	getPrice() — возвращает стоимость товаров в корзине;
// •	describe() — выводит или возвращает информацию о корзине в виде строки: "<Наименование товара> — <Цена одной позиции> — <Количество>".
// Класс Product должен содержать два метода:
// •	getName() — возвращает наименование товара;
// •	getPrice() — возвращает стоимость товара.
// Реализовать все методы:
// 2. Создать корзину, заполнить ее товарами. Создать заказ на основе этой корзины: 
// $order = new Order($basket);
// 3. Вывести информацию о корзине этого заказа и общую стоимость заказа.
// 4. Создать нового клиента "Николай Николаича" из предыдущего задания (не копируя описание его класса в этот файл) и отправить ему уведомление с текстом: 
// "для вас создан заказ, на сумму: <сумма заказа>. Состав: <информация о корзине>".

namespace Shop;

class Order
{
	public $basket;

	public function __construct($basket){
		$this->basket = $basket;
	}

	public function getBasket() {
		return $this->basket->products;
	}

	public function getPrice() {
		return $this->basket->getPrice();
	}
}

class Basket
{
	public $products = [];

	public function addProduct(Product $product, $quantity) {
		$this->products[] = [
			'title' => $product->title,
			'price' => $product->price,
			'quantity' => $quantity
		];
	}

	// Функция возвращает общую сумму товаров в корзине
	public function getPrice() {
		$totalPrice = 0;
		if (!empty($this->products)) {
			foreach ($this->products as $value) {
				$totalPrice += $value['price'];
			}
		}
		return $totalPrice;
	}

	public function describe() {
		$describe;
		if (!empty($this->products)) {
			foreach ($this->products as $value) {
				$describe .= $value['title'] . " - " . $value['price'] . " - " . $value['quantity'] . "</br>";
			}
		} else {
				$describe = 'Коризна пуста';
		}
		return $describe;
	}
}

class Product
{
	public $title;
	public $price;

	public function __construct($title, $price) {
		$this->title = $title;
		$this->price = $price;
	}

	public function getName() {
		return $this->title;
	}

	public function getPrice() {
		return $this->price;
	}
}

// Создаем продукты
$product1 = new Product('Машинка на управлении', 1500);
$product2 = new Product('Конструктор лего', 1700);

// Наполняем корзину товарами
$basket = new Basket;
$basket->addProduct($product1, 1); 
$basket->addProduct($product2, 2); 


// Выводим массив с товарами корзины
echo "<pre>";
print_r($basket->products);
echo "</pre>";

// Выводим сумму зака в корзине
echo $basket->getPrice();

// Выводим содержимое корзины
echo $basket->describe();

// Создаем заказ на основании существующей корзины
$order = new Order($basket);

// Выводим информацию о корзине этого заказа и общую стоимость
echo $order->basket->describe();
echo $order->basket->getPrice();

// Создаем нового клиента из другого пространства имен
include_once('task-4.php');
$client = new \NotificationClient\User('Николай Николаиы', 'test@yandex.ru');

echo $client->notify('для вас создан заказ, на сумму: ' . $order->basket->getPrice() . ' Состав: </br>' . $order->basket->describe());