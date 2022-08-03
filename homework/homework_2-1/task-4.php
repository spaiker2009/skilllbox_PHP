<?php 

// 1. Описать класс User. Пользователь, у него обязательно должно быть указано ФИО и email, а также могут быть указаны, а могут и нет, пол, возраст и телефон, которые должны быть проинициализированы в конструкторе.
// 2. Cоздать и реализовать методы пользователя:
// •	notifyOnEmail($message) — вызывает функцию send();
// •	notifyOnPhone($message) — вызывает функцию send();
// •	notify($message);
// •	censor($message).
// send(....) — выводит строку "Уведомление клиенту: <ФИО> на <канал уведомления> (<email или телефон клиента>): <message>".
// Нужно подумать, какие параметры должен принимать этот метод. Например: "Уведомление клиенту: Владимир Николаевич на email (user1@email.com): goodbye".
// Обязательно указывать уровни доступа к вашим методам. У каждого метода должен быть уровень доступа (инкапсуляция), о ней мы подробнее расскажем в следующем уроке.
// В случае, если вы не уверены, что клиенту есть 18 лет, метод notify($message) должен произвести цензуру сообщения (придумать любую реализацию метода censor()). Затем нужно отправить уведомление клиенту на email и на телефон, если телефон указан.
// 3. Создать разных пользователей и отправить им уведомления. Пользователи должны быть созданы так, чтобы были вызваны все методы класса User. 


namespace NotificationClient;

class User
{
	public $name;
	public $mail;
	public $gender;
	public $age;
	public $phone;

	function __construct($name, $mail, $age = null, $gender = null, $phone = null) {
		$this->name = $name;
		$this->mail = $mail;
		$this->gender = $gender;
		$this->age = $age;
		$this->phone = $phone;
	}

	// Указываем параметр тип, чтобы знать какое свойство передавать
	public function notifyOnEmail($message) {
		$type = $this->mail;
		return $this->send($type, $message);
	}

	public function notifyOnPhone($message) {
		$type = $this->phone;
		return $this->send($type, $message);
	}

	// Функция для отправки уведомлений. Проверяем возраст, если меньше 18, то вызываем функцию censor(). Потом вызываем функции уведомления на email или телефон по условию
	public function notify($message) {
		$text = $message;
		if ($this->age < 18) {
			$text = $this->censor($message);
		}
		$this->notifyOnEmail($text);
		if ($this->phone) {
			$this->notifyOnPhone($text);
		}
	}

	public function censor($message) {
		return $message .= ' (цензура пройдена)';
	}

	public function send($type, $message) {
		echo "Уведомление клиенту: $this->name, на $type: $message </br>";
	}

}

$client1 = new User('Вова', 'test@yandex.ru');
$client2 = new User('Михаил Василич Потемкин', 'potemkin@yandex.ru', '24', 'man', '+7-981-231-51-14');
$client3 = new User('Светлана Бычкова', 'svetkan@google.com', '42', 'women', '+7 (911) 285-62-34');
$client4 = new User('Генадий Холодов', 'holodov@yandex.ru', '17');
$client5 = new User('Мироша Венедиктов', 'mirosha@yandex.ru', '48', 'man', '+7-812-432-72-99');

// echo $client1->notify('Все ок') . "</br>";
// echo $client2->notify('Койка зовет') . "</br>";
// echo $client3->notify('Товар на складе') . "</br>";
// echo $client4->notify('Все дедлайны сорваны') . "</br>";
// echo $client5->notify('Я пока учусь. Не судите строго.') . "</br>";