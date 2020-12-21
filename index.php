<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
		<?
            $queryTab = "city";
            $headText = "Таблица Населенные пункты";
            $arrayTitle = array("№","Наименование",  "Тип", "Площадь", "Население", "Регион", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            $queryTab = "shop";
            $headText = "Таблица Сети магазинов";
            $arrayTitle = array("№","Название", "ИНН", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            
            $queryTab = "points_info";
            $headText = "Таблица Точки продаж";
            $arrayTitle = array("№","Магазин", "Предметы", "объем продаж", "торговый баланс", "ФИО директора", "адрес", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            
            echo("<div>");
            echo("<div> <a href='gen_pdf.php'> Показать pdf </a> </div>");
            echo("<div> <a href='gen_xls.php'> Показать xls </a> </div>");
            echo("</div>");

            echo("<div>");
            echo("<div> <a href='new.php?Index="."city"."'> Добавить новый Населенный пункт</a> </div>");
            echo("<div> <a href='new.php?Index="."shop"."'> Добавить новый магазин</a> </div>");
            echo("<div> <a href='new.php?Index="."points"."'> Добавить точку продаж</a> </div>");
            echo("</div>");

		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>