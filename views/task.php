
<h3 class = "size_h3">Задание:</h3>
<form class='form_sort' action="/" method="post">
	<p id = 'sort'>
		<select class = 'sort ' size="1" name="sort">
		    <option value="t1" selected>по умолчанию</option>
		    <option value="t2" <?php if($_SESSION['sort']['selt'] == 't2'){ echo "selected";}?>>сначала выполненые</option>
		    <option value="t3" <?php if($_SESSION['sort']['selt'] == 't3'){ echo "selected";}?>>сначала в процессе</option>
		    <option value="t4" <?php if($_SESSION['sort']['selt'] == 't4'){ echo "selected";}?>>по имени</option>
		    <option value="t5" <?php if($_SESSION['sort']['selt'] == 't5'){ echo "selected";}?>>по email</option>
		    <?php unset($_SESSION['sort']);?>
		</select>
		<input name ="submit" type="submit" value="Сортировать">
	</p>
</form>
<?php

	if(isset($_SESSION['cookie']['name'])) {
		echo "<p class = 'but ringt_group'><a href = '/add_task' >Добавить задание</a></p>";
	}
	foreach ($tasks  as $value) {
		
		echo "<div id='rew' class = ' tok row'>
				<div class = 'col-md-6'>
				<img src = 'views/img/task_img/".$value['name_image']."'>
				</div>
				<div class = 'col-md-6'>";
			if ($value['status'] == 'yes') {
				echo "<p>Статус: Выполнено !";
			}
			if ($value['status'] == 'no') {
				echo "<p>Статус: В процеси выполнения</p>";
			}
		echo "<br>Создал: ".$value['name']."
				<br>Email: ".$value['email']."
				<br><br>Задание:".$value['task']."</p>
				
				<div id='bun'><form method='post'>";
				
		if($_SESSION['cookie']['access'] == "admin"){
			echo "<button class = 'but but_edit' formaction = '/edit/".$value['id']."' name='id' value='".$value['id']."'>Редактировать</button>"; 
			if($value['status'] != 'yes'){
				echo "<button  class = 'but but_edit' name='id_yes' value='".$value['id']."' formaction = '/done/".$value['id']."'>Выполнено</button>";
			}
			if($value['status'] != 'no'){
				echo "<button class = 'but but_edit' name='id_no' value='".$value['id']."' formaction = '/done/".$value['id']."'>Не выполнино</button>";
			}
		}
		echo "</form></div></div></div>";
	}

?>