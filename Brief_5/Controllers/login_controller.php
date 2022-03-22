<?php

class login_controller{

public function inscreption(){
	if(isset($_POST['submit'])){
		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$date_de_naissance = $_POST['date_de_naissance'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$statut = 0;

		
		$user = new User();
		$user->user_inscription($nom, $prénom,$date_de_naissance,$email,$password,$statut);
	} 
}

public function Connecter(){
	if(isset($_POST['submit'])){
		
		$email = $_POST['email'];
		echo $email;
		$password = $_POST['password'];
		$user = new User();
		$user->user_connecter($email, $password);
	}
}
public function De_Connecter(){
	$user = new User();
	$user->log_out();
}
}

?>