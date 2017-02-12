
<h3 class = "size_h3">Задание:</h3>

<?php

	if(isset($_SESSION['cookie']['name'])) {
		echo "<p class = 'but ringt_group'><a href = '/add_task' >Добавить задание</a></p>";
	}
	foreach (conclusion_task()  as $value) {
		
		echo "<div id='rew' class = ' tok row'>
				<div class = 'col-md-6 cd'>
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