
<?php if(isset($_SESSION['edit']['success'])): ?>
	<div class = "ok"><?=$_SESSION['edit']['success']?></div>
<?php endif; unset($_SESSION['edit']['success']);?>

<?php 

	if(!empty(edit_task())){
		
		echo "<form method='post' ><div id = 'rew' class='row tok_edit'><div class='col-md-6'>
			<img class = 'img_edit' src='/views/img/task_img/".edit_task()['name_image']."''></div>";
		
		echo "<div class='col-md-5'>
			<label>Задание: </label><br> <textarea background = 'black' name = 'task' cols='45' rows='10 '
			id='task'>".edit_task()['task']."</textarea>
			<br><label>Дата добавления: </label>".edit_task()['data']."<br>" ; 
		echo '<button class="but_edit" formaction = "/save_or_del/'.edit_task()['id'].'" name = "save" value = "'.edit_task()['id'].'">Сохранить</button>'; 
		echo '<button class="but_edit" formaction = "/save_or_del/'.edit_task()['id'].'" name = "del" value = "'.edit_task()['id'].'">Удалить</button></div></div></form>';
		unset($_SESSION['edit']);
	}
?>