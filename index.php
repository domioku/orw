<?php require('common.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dominik Okuliński - AJAX</title>
	<script src="jquery-1.10.2.min.js"></script>
	<script>
		//AJAX
		function check(){
			$.ajax({
				type: 'POST',
				url: 'checker.php',
				dataType: 'json',
				data: {
					counter:$('#message-list').data('counter')
				}
			}).done(function( response ) {
				// zaktualizowanie licznika 
				$('#message-list').data('counter',response.current);
				// sprawdzenie czy przy response nie ma aktualizacji
				if(response.update==true){
					$('#message-list').html(response.news);
				}
			});
		}
		//Co 20 sekund wykonywana jest funkcja check
		setInterval(check,20000);
	</script>
</head>
<body>
	<p>Laboratorium nr.2 - technologia AJAX</p>
	<p>Strona prezentuje sposób na automatyczne odświeżenie zawartości strony z wykorzystaniem AJAXa (w tym przypadku jest to tablica zawierająca "newsy").</p>
	<div id="message-list" data-counter="<?php echo (int)$db->check_changes();?>">
		<?php echo $db->get_news();?>
	</div>
	<p><a href="add.php">Dodaj nową wiadomość</a></p>
</body>
</html>

