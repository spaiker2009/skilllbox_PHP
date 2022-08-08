<?php 

// Черный ящик – Инкапсуляция
// 1. Создать классы:
// •	BlackBox — черный ящик, у него должно быть закрытое от всех свойство private $data;
// •	Plane — самолет, должен содержать закрытое свойство private $blackBox. В конструкторе это свойство должно быть проинициализировано новым классом BlackBox;
// •	Engineer — Инженер-дешифровщик черных ящиков.
// Класс BlackBox содержит следующие методы:
// •	public function addLog($message) — добавляет очередную строку в свое свойство $data;
// •	public function getDataByEngineer(Engineer $engineer) — возвращает свои данные для инженера.
// Класс Plane должен содержать методы: 
// public function flyAndCrush()
// {
// $this->flyProcess();
// $this->crushProcess();
//     }, где flyProcess — процесс полета может иначе проходить для других самолетов, пишет лог в черный ящик, придумайте что будет записано в этом методе в черный ящик, а crushProcess — процесс крушения переопределен быть не может, пишет лог в черный ящик. Нужно придумать, что будет записано в этом методе в черный ящик;
// •	protected function addLog($message) — передает сообщение для записи в лог черного ящика;
// •	public function getBoxForEngineer(Engineer $engineer)
// {
// $engineer->setBox($this->blackBox);
//     }
// 2. Реализовать класс Engineer:
// •	public function setBox(BlackBox $blackBox) — устанавливает черный ящик для дешифрации у инженера;
// •	public function takeBox(Plane $plane) — должен доставать черный ящик из самолета (нужно посмотреть, какой подходящий метод есть в классе Plane);
// •	public function decodeBox() — декодирует черный ящик — выводит на экран лог черного ящика. ЗАКОНЧИЛ ЗДЕСЬ
// 3. Реализовать методы без изменения области видимости методов и свойств.
// 4. Создать самолет, устроить ему полет с крушением.
// 5. Создать инженера, взять черный ящик из упавшего самолета и дешифровать его.
// 6. Создать новый вид самолета (наследоваться следует от Plane). Самолет должен вести другой лог во время полета. Но, к сожалению, путь его тот же, что и для предыдущего самолета. Дешифровать и его лог.


// Класс черный ящик, записывает данные полета в себя
class BlackBox
{
	private $data = [];

	// Метод добавляет сообщение в массив данных
	public function addLog($message) 
	{
		$this->data[] = $message;
	}

	// Метод возвращает данные из черного ящика инженеру
	public function getDataByEngineer(Engineer $engineer)
	{
		return $this->data;
	}
}

// Класс самолет
class Plane
{
	// Записывает класс черного ящика в свойство
	private $blackBox;

	public function __construct(BlackBox $blackBox)
	{
		$this->blackBox = $blackBox;
	}

	// Инициализация полета, вызывает две функции
	public function flyAndCrush()
	{
		$this->flyProcess();
		$this->crushProcess();
	}

	// Функция вызывает функциию добавления записи в черный ящик при успешном продолжении полета
	public function flyProcess()
	{
		$message = 'Полет проходит благополучно.';
		$this->addLog($message);
	}

	// Функция вызывает функциию добавления записи в черный ящик при крушении самолета
	private function crushProcess()
	{
		$message = 'Потеря высоты, крушение.';
		$this->addLog($message);
	}

	// Функция передает сообщение для записи в лдог черного ящика
	protected function addLog($message)
	{
		$this->blackBox->addLog($message);
	}

	// Метод возвращает черный ящик инженеру для дешифорвки
	public function getBoxForEngineer(Engineer $engineer)
	{
		$engineer->setBox($this->blackBox);
	}
}

class BoeingPlane extends Plane 
{
	public function flyProcess()
	{
		$message = 'Самолет отлично держит высоту.';
		$this->addLog($message);
	}
}

class Engineer
{
	// Свойства для хранения объекта черного ящика, который передается по методу setBox() 
	private $blackBox;

	// Записывает в свойство черный ящик, который передается с самолета
	public function setBox(BlackBox $blackBox)
	{
		$this->blackBox = $blackBox;
	}

	// Вызывает метод, который достает из самолета черный ящик
	public function takeBox(Plane $plane)
	{
		$plane->getBoxForEngineer($this);
	}

	// Декодирует черный ящик
	public function decodeBox()
	{
		return $this->blackBox->getDataByEngineer($this);
	}
}

// Дешифруем первый самолет
$plane = new Plane(new BlackBox());
$plane->flyAndCrush();

$engineer = new Engineer();
$engineer->takeBox($plane);

var_dump($engineer->decodeBox());


// Дешифруем второй самолет
$plane2 = new BoeingPlane(new BlackBox());
$plane2->flyAndCrush();

$engineer2 = new Engineer();
$engineer2->takeBox($plane2);

var_dump($engineer2->decodeBox());