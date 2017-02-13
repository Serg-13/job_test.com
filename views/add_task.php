<h3 class = "size_h3">Добавление нового задание:</h3>
<div id="status" class = "no_ne tok  row" >
	<div class = 'col-md-6' >
		<p id = 'img_add_task'>Здесь будет находиться ваша картинка!!!<p>
	</div>
	<div class = 'col-md-6'>
		<p class = "text"></p>
		<input type='button' class = "edit" value='Вернутся к редактору'>
	</div>
</div>

<form method = 'post' action = "/add_task"  class = 'add_task b_lock' enctype="multipart/form-data" id = "form">
  
  <p><b>Введите задание: </b></p>
  
  <p><textarea id="area" name="area" style="height:150px; width:600px;">Опишите ваше задание!!!</textarea></p>

  <input type='file' name = 'image' value='Добавить изображение' required>
  <input type='button' class = "test" value='Предварительный просмотер'>
  <input type='submit' name='submit' class = "sub" value='Добавить'>
  
</form>

<?php if(isset($_SESSION['load']['error']) and $_SESSION['load']['error'] != 'no'): ?>
	<div class="error"><?=$_SESSION['load']['error'];?></div>
<?php endif; unset($_SESSION['load']);?>



<div id="load"></div>

<script src="/views/js/jquery-3.1.1.min.js"></script>
<script src="/views/js/script_file.js"></script>	

