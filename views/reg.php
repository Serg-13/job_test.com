
		<h3>Регистрация</h3>

		<?php if(isset($_SESSION['reg']['success'])): ?>
		
			<div class = "ok"><?=$_SESSION['reg']['success']?></div>
		
		<?php elseif(!isset($_COOKIE['login'])): ?>
			
			<div class="form">
				<form action="/reg" method="post">
					<p>
						<label for="name_reg">Имя:</label>
						<input type="text" name="name_reg" id="name_reg">
					</p>
					<p>
						<label for="email_reg">Email:</label>
						<input class="access" type="text" data-field="email" name="email_reg" id="email_reg">
						<span></span>
					</p>
					<p>
						<label for="login_reg">Логин:</label>
						<input class="access" type="text" data-field="login" name="login_reg" id="login_reg">
						<span></span>
					</p>
					<p>
						<label for="password_reg">Пароль:</label>
						<input type="password" name="password_reg" id="password_reg">
					</p>
					<p class="submit">
						<input type="submit" value="Зарегистрироваться" name="reg">
					</p>
				</form>
			</div>

			<?php if(isset($_SESSION['reg']['errors'])): ?>
				<div class="error"><?=$_SESSION['reg']['errors'];?></div>
			<?php endif;?>

		<?php endif; unset($_SESSION['reg']);?>

		<script src="/views/js/jquery-3.1.1.min.js"></script>
		<script src="/views/js/script_file.js"></script>	
