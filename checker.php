<?php require('common.php');
//do zmiennej wrzuca wartość licznika
$data['current'] = (int)$db->check_changes();
//ustawiana jest wartość false dla zmiennej update
$data['update'] = false;
//sprawdź czy to jest odwołanie AJAXa z przesyłanym za pomocą POST wartością licznika 
//i sprawdź czy licznik jest inny od tego, który jest aktualny w bazie danych
if(isset($_POST) && !empty($_POST['counter']) && (int)$_POST['counter']!=$data['current']){
	//licznik jest inny, więc pobierana jest lista newsów
	$data['news'] = '<h1>Nowy news! Działa!</h1>';
	$data['news'] .= $db->get_news();
	$data['update'] = true;
}
//wyświetla informacje jako json
echo json_encode($data);
