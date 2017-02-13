<div class="form auth">

	<?php if($_SESSION['cookie']['errors'] == 'yes'): ?>
	
	<form action="/log_in" method="post" id='login'>
		
		<p>
			<label for="login">Логин:</label>
			<input type="text" name="login" id="login">
		</p>
		<p>
			<label for="password">Пароль:</label>
			<input type="password" name="password" id="password">
		</p>
		<p class="submit">
			<input type="submit" value="Войти" name="log_in">
			<a href="/reg">Регистрация</a>
		</p>
	
	</form>
	
	<?php unset($_SESSION['cookie'])?>

	<?php if(isset($_SESSION['auth']['errors'])): ?>
		
		<div class="error"><?=$_SESSION['auth']['errors']?></div>
		
	<?php unset($_SESSION['auth'])?>
	
	<?php endif; ?>
	
	<?php else: ?>
			
		<h4>Добро пожаловать,</h4>
		<p><b><?=htmlspecialchars($_SESSION['cookie']['name'])?></b></p>
		<p class = 'but'><a href='/logout'>Выход</a></p>
	
	<?php endif; ?>
		<div class = 'but'><a href = "/" >Главная</a></div>
		<div class = 'but'><a href = "dayside/" >Dayside</a></div>
</div>