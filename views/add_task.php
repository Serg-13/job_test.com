<h3 class = "size_h3">Добавление нового задание:</h3>
<div id="status" class = "no_ne" >
	<p class = "text"></p>
	<input type='button' class = "edit" value='Вернутся к редактору'>
</div>

<form method = 'post' action = "/add_task"  class = 'task' enctype="multipart/form-data" id = "form">
  
  <p><b>Введите задание</b></p>
  
  <p><textarea id="area" name="area" style="height:50px; width:500px;">Опишите ваше задание!!!</textarea></p>

  <input type='file' name = 'image' value='Добавить изображение'>
  <input type='button' class = "test" value='Предварительный просмотер'>
  <input type='submit' class = "sub" value='Добавить'>
  
</form>

<?php if(isset($_SESSION['load']['error']) and $_SESSION['load']['error'] != 'no'): ?>
	<div class="error"><?=$_SESSION['load']['error'];?></div>
<?php endif; unset($_SESSION['load']);?>



<div id="load"></div>

<script src="/views/js/jquery-3.1.1.min.js"></script>
<script src="/views/js/script_file.js"></script>	

