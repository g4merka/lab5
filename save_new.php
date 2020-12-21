<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_POST['index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "city":
                        if((isset($_POST['name']))&&(isset($_POST['type']))&&(isset($_POST['area']))&&(isset($_POST['pop']))&&(isset($_POST['reg']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
                            $area = htmlentities(mysqli_real_escape_string($link, $_POST['area']));
                            $pop = htmlentities(mysqli_real_escape_string($link, $_POST['pop']));
                            $reg = htmlentities(mysqli_real_escape_string($link, $_POST['reg']));
                            if((strlen($name)==0)||(strlen($type)==0)||(strlen($area)==0)||(strlen($pop)==0)||(strlen($reg)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, name, type, area, pop, reg) VALUES (NULL, '$name', '$type', '$area', '$pop', '$reg')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "shop":
                        if((isset($_POST['name']))&&(isset($_POST['inn']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $inn = htmlentities(mysqli_real_escape_string($link, $_POST['inn']));
                            if((strlen($name)==0)||(strlen($inn)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, name, inn) VALUES (NULL, '$name', '$inn')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "points":
                            if((isset($_POST['shop']))&&(isset($_POST['city']))&&(isset($_POST['sales']))&&(isset($_POST['balance']))&&(isset($_POST['fio']))&&(isset($_POST['adress']))){
                            $shop= htmlentities(mysqli_real_escape_string($link, $_POST['shop']));
                            $city = htmlentities(mysqli_real_escape_string($link, $_POST['city']));
                            $sales = htmlentities(mysqli_real_escape_string($link, $_POST['sales']));
                            $balance = htmlentities(mysqli_real_escape_string($link, $_POST['balance']));
                            $fio = htmlentities(mysqli_real_escape_string($link, $_POST['fio']));
							$adress = htmlentities(mysqli_real_escape_string($link, $_POST['adress']));
                            if(($shop=="")||($city=="")||(strlen($fio)==0)||(strlen($adress)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, shop, city, sales, balance, fio, adress) VALUES (NULL, '$shop', '$city', '$sales', '$balance', '$fio', '$adress')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                }
			}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>