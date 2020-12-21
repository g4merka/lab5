<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "city":
                        echo("<fieldset><legend>Добавить новый Населенный пункт</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите Наименование: <input name='name' type='text' maxlength='16'/> <br>");
                        echo("Введите Тип: <input name='type' type='text' maxlength='16'/> <br>");
                        echo("Введите площадь: <input name='area' type='number'min='1' max='100000' value='1'/> <br>");
                        echo("Введите население: <input name='pop' type='number'min='1' max='100000' value='1'/> <br>");
                        echo("Введите регион: <input name='reg' type='text' maxlength='16'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "shop":
                        echo("<fieldset><legend>Добавить новый магазин</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите Название: <input name='name' type='text' maxlength='16'/> <br>");
                        echo("Введите ИНН: <input name='inn' type='text' maxlength='16'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "points":
                        $queryTab_0 = "shop";
                        $queryTab_1 = "city";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить точку продаж</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        $id_0 = "shop";
                        echo("<label for='$id_0'>Список магазинов: </label>");
                        echo("<select id='$id_0' name='$id_0'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            echo("<option value='$row[0]'> $row[0]. $row[1]|$row[2]</option>");
                        }
                        echo("</select><br>");
                        $id_1 = "city";
                        echo("<label for='$id_1'>Список населенных пунктов: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_1)){
                            echo("<option value='$row[0]'> $row[0]. $row[1]|$row[2]</option>");
                        }
                        echo("</select><br>");
                        
                        echo("Введите объем продаж: <input name='sales'  type='number' min='1' max='99999' value='1'/> <br>");
                        echo("Введите торговый баланс: <input name='balance' type='number' min='1' max='99999' value='1'/> <br>");
                        echo("Введите ФИО директора : <input name='fio' type='text' maxlength='16'/> <br>");
                        echo("Введите адрес: <input name='adress' type='text' maxlength='16'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                }
			    
			}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>