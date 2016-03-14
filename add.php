<?php require('common.php');
if($_POST && !empty($_POST['title'])){
	$result = $db->add_news(strip_tags($_POST['title']));
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dominik Okuliński - AJAX</title>
</head>
<body>
	<p>Laboratorium nr.2 - technologia AJAX</p>
	<p>Strona prezentuje sposób na automatyczne odświeżenie zawartości strony z wykorzystaniem AJAXa (w tym przypadku jest to tablica zawierająca "newsy").</p>
	<p>Otwórz <a href="index.php">główną stronę</a> w nowym oknie i dodaj news. Nie odświeżaj drugiego okna ręcznie. Powinno odświeżyć się automatycznie po paru sekundach.<p>
	<?php if(isset($result)){
		if($result==TRUE){
			echo '<p>Sukces!</p>';
		}else{
			echo '<p>Error</p>';
		}
	}else{?>
		<form method="post" action="#">
			<input type="text" name="title" size="50" />
			<input type="submit" value="Dodaj news" />
		</form>
	<?php }?>
</body>
</html>

