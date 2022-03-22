<?php
 class User{

// SELECT COUNT(*) as count_res, (SELECT COUNT(*) FROM `passageres` LEFT JOIN réservation ON passageres.id = réservation.id WHERE id_vol = 1) as count_passageres FROM `réservation` WHERE id_vol = 1;

    function __construct() {
			$this->conn = new mysqli("localhost","root","","brief-5");
		}

		public function user_inscription($nom, $prénom,$date_naissance, $email,$mode_passe,$statut) {

			$query= "SELECT * FROM utilisateur WHERE email=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$result= $stmt->get_result();
			$row1 = mysqli_num_rows($result);
			if ($row1 == 1) {
                header("Location:Login");
			} else {
				
				$stmt =$this->conn->prepare("INSERT INTO utilisateur (nom, prénom,date_de_naissance,email,password, statut) values(?,?,?,?,?,?)");
				$stmt->bind_param("sssssi", $nom, $prénom,$date_naissance, $email, $mode_passe, $statut);
				$stmt->execute();
				header("Location:Login");
			}	
		}
		public function  user_connecter($email,$password) {
			$query= "SELECT * FROM utilisateur WHERE email=? && password =?";
			$stmt =$this->conn->prepare($query);
			$stmt->bind_param("ss",$email,$password);
			$stmt->execute();
			$result= $stmt->get_result();
			$row1 = mysqli_num_rows($result);
			$row2 = $result->fetch_assoc();
			$_SESSION['login']=true;
			$_SESSION["statut"] =  $row2["statut"];
			$_SESSION["id_user"] =  $row2["id_utilisateur"];
			if ($row1 == 1 ) {
				if ($row2["statut"] === 1) {
                    $_SESSION['user_bool']=false ;
                    $_SESSION['user']='';
                    $_SESSION['admin_bool']=true ;
                    $_SESSION['admin']='admin';
					header("Location: Dashboard");
					# code...
				} else {
                    $_SESSION['admin_bool']=false ;
                    $_SESSION['admin']='';
                    $_SESSION['user_bool']=true ;
                    $_SESSION['user']='user';

					# code...
					header("Location: Home");
				}				
			} else {
                $_SESSION['login'] == true;
				header("Location: Login");
			}
		}
		
		public function log_out()
		{
			session_destroy();

			$_SESSION['login']=false;
            $_SESSION['admin_bool']=false ;
            $_SESSION['admin']='';
            $_SESSION['user_bool']=false ;
            $_SESSION['user']='';
			header("Location: index");
		}


		

}
?>