<?php 
class DB{

     public static function connect(){
        try {
            //code...
            $conn= new PDO("mysql: host=localhost; dbname=brief-5", 'root', '');
            $conn->exec("set names utf8");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $conn;
        } catch (PDOException $e) {
            //throw $th;
            return $e->getMessage();
        }
        
    }
}
?>

