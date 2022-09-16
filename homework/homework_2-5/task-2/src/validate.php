<?php

// Валидация с помощью исключений

// 1. Создать простую html-страницу с веб-формой, в форме должны быть поля: name – имя, age – возраст, email – email.
// 2. Если при отправке формы валидация пройдена, то должно быть выведено сообщение об
// успешном изменении, при ошибке валидации – должна быть выведена соответствующая ошибка.
// Код для обработки запроса формы должен выглядеть так:
// $success = false;
// if (! empty($_POST)) {
// try {
// $success = (new UserFormValidator())-&gt;validate($_POST);
// } catch (\Exception $e) {
// $error = $e-&gt;getMessage();
// }
// }
// 3. Создать класс UserFormValidation, реализовать метод validate.
// Требования к валидации:
// •	имя должно быть не пустым;
// •	возраст должен быть не менее 18 лет;
// •	email должен быть заполнен и соответствовать формату email. 

namespace validate;

class ErrorValidate extends \LogicException {}
class EmptyFieldValidate extends ErrorValidate {}
class NotValidateAge extends ErrorValidate {}
class MailValidate extends ErrorValidate {}

$success = false;

if (!empty($_POST)) {
	try {
		$success = (new UserFormValidator())->validate($_POST);
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

class UserFormValidator
{
	public function validate(array $request)
	{
		if (empty($request['name']) || empty($request['mail'])) {
			throw new EmptyFieldValidate('Поле должно быть заполнено');
		} elseif (gettype($request['age'] == 'integer') && $request['age'] < 18) {
			throw new NotValidateAge('Не корректный возраст');
		} elseif (!filter_var($request['mail'], FILTER_VALIDATE_EMAIL)) {
			throw new MailValidate("Ошибка при заполнении почты");
		} else {
			$success = true;
			return $success;
		}

	}
}