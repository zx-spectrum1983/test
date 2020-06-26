<?php

$template="";

$mysqli = new mysqli($DBhost, $DBuser, $DBpass, $DBname);
if ($mysqli->connect_errno) {
    $template = "Номер ошибки: " . $mysqli->connect_errno . "<br>";
    $template .= "Ошибка: " . $mysqli->connect_error;
} else {
    // Добавляем запись
    if (isset($_POST['submit'])) {
	$sql = "INSERT INTO inv_main_items ( inv_id, item, sn ) VALUES ( ".$_POST['inv_id'].", \"".$mysqli->real_escape_string($_POST['item'])."\", \"".$_POST['sn']."\")";
	echo $sql;
	$mysqli->query($sql);
	}
    // Создаем таблицу
    $sql = "SELECT id, inv_id, item, sn, date FROM inv_main_items ORDER BY id DESC LIMIT 5";
    if (!$result = $mysqli->query($sql)) {
	$template = "Ошибка: " . $mysqli->error . "\n";
	} else {
	    if ($result->num_rows === 0) {
		$template = "Нет данных";
		} else {
		    $template = "<form action=\"\" method=\"post\"><table border=1 width=\"100%\">";
		    $template .= "<tr><td>Инвентарный номер</td><td>Старый номер</td><td>Наименование</td><td>Серийный номер</td><td>Дата добавления</td></tr>";
		    $template .= "<tr><td>&nbsp;</td><td><input type=\"text\" name=\"inv_id\"></td><td><input type=\"text\" size=\"50\" name=\"item\"></td><td><input type=\"text\" name=\"sn\"></td><td><button type=\"submit\" name=\"submit\">Добавить</button></td></tr>";
		    while ($data = $result->fetch_assoc()) {
			$template .= "<tr><td>".$data['id']."</td><td>".$data['inv_id']."</td><td>".$data['item']."</td><td>".$data['sn']."</td><td>".$data['date']."</td></tr>";
			}
		    
		    }
		$template .= "</table></form>";
		$result->free();
	    }
	
    }
$mysqli->close();

?>
