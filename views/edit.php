<?php if(isset($_SESSION['edit']['success'])): ?>
	<div class = "ok"><?=$_SESSION['edit']['success']?></div>
<?php endif; unset($_SESSION['edit']['success']);?>



<?php 
	if(!empty(edit_task())){
		echo "<form method='post' ><div id = 'rot' class='row'><div class='col-md-4'>
			<img class='book_img' src='/views/img/task_img/".edit_task()['name_image']."' width ='260px '></div>";
		echo "<div class='col-md-7 tex'>
			<br><label>Задание: </label><br> <textarea name = 'task' cols='50' rows='10 '
			id='task'>".edit_task()['task']."</textarea>
			<br><label>Дата добавления: </label>".edit_task()['data']."<br>" ; 
		echo'<button formaction = "/save_del/'.edit_task()['id'].'" name = "save" value = "'.edit_task()['id'].'">Сохранить</button> 
			<button formaction = "/save_del/'.edit_task()['id'].'" name = "del" value = "'.edit_task()['id'].'">Удалить</button></div></div></form>';
	}
?>