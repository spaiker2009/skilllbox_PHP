<?php 
	include_once('src/validate.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Валидации формы</title>
  <link rel="shortcut icon" href="images/#" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
 <body>
	<header>
		<div class="content">
			<div class="left">
				<img src="images/logo.png"/>
			</div>
			<div class="right">
				<h2>8 (775) 709-30-17<br/>
				8 (707) 709-30-17</h2>
			</div>
		</div>
	</header>
	<div class="case block-1">
		<div class="content">
			<h1>Дизайнерские кухни на заказ в <span>Астане</span></h1>
			<h2>срок изготовления до <span>14 дней</span></h2>
		<div class="left">
			<div class="disk-1">
				<div class="disk-2">
					<p>Акция!</p>
				</div>
			</div>
			<div class="disk-3">
				<div class="disk-4">
					<p>при заказе<br/>
					кухни - <span>бутылка<br/>
					элитного виски</span><br/>
					<span class="text2">в подарок!<span></p>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="block-form1">
				<h3>Закажите кухню<br/>
				прямо сейчас!</h3>
				<form id="individualForm" class="form" enctype="multipart/form-data" name="form" action="/task/task-2/form.php" method="post">
						<input id="individualFormName" class="firstname" type="text" title="Имя" placeholder="Введите имя" name="name"></input>
						<input id="individualFormPhone" class="age" type="text" placeholder="Введите возраст" name="age"></input>
						<input id="individualFormPhone" class="mail" type="text" placeholder="Введите почту" name="mail"></input>
						<button class="order" type="submit" name="sender"><p>Заказать звонок</p></button>
				</form>
				<p class="form1-text">*Ваши данные не будут переданы<br/>
				 третьим лицам.</p>
			</div>
		</div>
		</div>

		<?php if (isset($success) && $success) : ?>
			<p>Форма отправлена успешно. Мы свяжемся с вами.</p>	
		<?php endif; ?>
		<?php if (isset($messageError) && $messageError) : ?>
			<p><?= $messageError; ?></p>	
		<?php endif; ?>
	</div>
 </body>
 </html>