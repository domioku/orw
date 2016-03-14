<?php

class db{


	public $db;

	function __construct(){
		$this->db_connect('localhost','root','','AJAX');
	}
	// Połaczenie z bazą danych
	function db_connect($host,$user,$pass,$database){
		$this->db = new mysqli($host, $user, $pass, $database);

		if($this->db->connect_errno > 0){
			die('Unable to connect to database [' . $this->db->connect_error . ']');
		}
	}

	// sprawdza stan licznika z bazy danych
	function check_changes(){
		$result = $this->db->query('SELECT counting FROM news WHERE id=1');
		if($result = $result->fetch_object()){
			return $result->counting;
		}
		return 0;
	}
	
	// W przypadku zmian (dodania nowego newsa) zwiększa licznik w db o 1
	function register_changes(){
		$this->db->query('UPDATE news SET counting = counting + 1 WHERE id=1');
	}


	//Wyświetla newsy w kolejności zgodnej z datą dodania
	function get_news(){
		if($result = $this->db->query('SELECT * FROM news WHERE id<>1 ORDER BY add_date DESC LIMIT 50')){
			$return = '';
			while($r = $result->fetch_object()){
				$return .= '<p>id: '.$r->id.' | '.htmlspecialchars($r->title).'</p>';
				$return .= '<hr/>';
			}
			return $return;
		}
	}

	// Dodaje nowy news	
	function add_news($title){
		$title = $this->db->real_escape_string($title);
		if($this->db->query('INSERT into news (title) VALUES ("'.$title.'")')){
			$this->register_changes();
			return TRUE;
		}
		return FALSE;
	}
}
