<?php

if (!isset($_POST['submit'])) {
    $template="
    <form action=\"\" method=\"post\">

    <p><label for=\"inv_id\">Предыдущий инвентарный номер</label><br>
    <input type=\"text\" id=\"inv_id\" name=\"inv_id\" size=\"50\"></p>

    <p><label for=\"item\">Оборудование</label><br>
    <textarea id=\"item\" name=\"item\" cols=\"50\" rows=\"10\"></textarea></p>

    <p><label for=\"sn\">Серийный номер</label><br>
    <input type=\"text\" id=\"sn\" name=\"sn\" size=\"50\"></p>

    <p><button type=\"submit\" name=\"submit\">Добавить</button></p>
    </form>
    ";
    }
else {
    $template = $_POST['inv_id']."<br>".$template = $_POST['item'];
    }

?>
