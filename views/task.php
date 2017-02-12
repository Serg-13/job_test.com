<?php
	foreach (conclusion_task()  as $value) {
		echo "<p>Создал:".$value['name']."</p>
				<p>Задание:".$value['task']."</p>
				<div id='bun'><form method='post' action = '/edit/".$value['id']."'>
				<button name='id' value='".$value['id']."'>X</button>
				</form></div>";
	}

?>