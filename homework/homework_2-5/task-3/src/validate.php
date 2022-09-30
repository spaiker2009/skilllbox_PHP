<?php

// Валидация 2.0

// 1. Добавить программе, созданной в задании выше, имитацию работы с базой данных.
// 2. Создать класс User. Класс должен содержать два метода:
// •	public function load($id) — метод должен формировать исключение, если $id не найден в базе данных (придумать условие на $id для имитации этой ошибки);
// •	public function save($data) — метод имитирует сохранение в базе данных возвращает true или false при ошибке. Для имитации работы метод должен возвращать случайное значение.
// 3. Добавить в форму поле id.
// 4. Доработать код.
// Перед валидацией нужно проверить, что пользователь существует в базе данных.
// После успешной валидации необходимо попробовать сохранить пользователя в базе
// данных.

namespace validate;

class ErrorValidate extends \LogicException {}
class EmptyFieldValidate extends ErrorValidate {}
class NotValidateAge extends ErrorValidate {}
class MailValidate extends ErrorValidate {}
class IdNotFind extends ErrorValidate {}

$success = false;

if (!empty($_POST)) {
	try {
		$success = (new UserFormValidator())->validate($_POST);
	} catch (IdNotFind $e) {
		$messageError = 'Ошибка - ' . $e->getMessage();
	} catch (EmptyFieldValidate $e) {
		$messageError =  'Ошибка - ' . $e->getMessage();
	} catch (NotValidateAge $e) {
		$messageError = 'Ошибка - ' . $e->getMessage();
	} catch (MailValidate $e) {
		$messageError = 'Ошибка - ' . $e->getMessage();
	} catch (\Exception $e) {
		$error = $e->getMessage();
	} 
}

class User
{
	// Имитация БД
	public $bdUsers = [1, 2, 3, 4];

	// Должен проверять, есть ли такой id в базе данных и если нет, то формировать исключение
	public function load($id)
	{
		$findId = false;
		foreach ($this->bdUsers as $user) {
			if ($user == $id) {
				$findId = true;
			}
		}
		if (!$findId) {
			throw new IdNotFind("Подобный ID не найден в базе данных");
		}
	}

	// Имитирует сохранение в базе данных заполненных данных. Возвращает true Или false. Должен возвращать случайное значение.
	public function save($data)
	{
		$randomValue = mt_rand(0, 1);
		echo $randomValue ? 'Данные сохранены' : 'Данные не сохранены';
			
		
	}
}

class UserFormValidator extends User
{
	public function validate(array $request)
	{		
		// Вызываем метод проверки id
		$this->load(htmlspecialchars($request['id']));

		if (empty($request['id']) || empty($request['name']) || empty($request['mail'])) {
			throw new EmptyFieldValidate('Поле должно быть заполнено');
		} elseif (gettype($request['age'] == 'integer') && $request['age'] < 18) {
			throw new NotValidateAge('Не корректный возраст');
		} elseif (!filter_var($request['mail'], FILTER_VALIDATE_EMAIL)) {
			throw new MailValidate("Ошибка при заполнении почты");
		} else {
			$success = true;
			$this->save($request);
			return $success;
		}
	}
}