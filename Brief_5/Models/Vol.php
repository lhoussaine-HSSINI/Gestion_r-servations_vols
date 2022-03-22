<?php 

class  Vol
{
//    all vol
        static public function getAll(){
            $stmt = DB::connect()->prepare('SELECT *FROM vol');
            $stmt->execute();
            return $stmt->fetchAll();
            // $stmt->Close();
            // $stmt=null;
        }
//        all reserve
        static public function getAll_reserv(){
        $stmt = DB::connect()->prepare("SELECT *FROM réservation 
            INNER JOIN utilisateur ON utilisateur.id_utilisateur = réservation.id_utilisateur
            INNER JOIN vol ON vol.id_vol = réservation.id_vol ");
        $stmt->execute();
        return $stmt->fetchAll();
        }
//        all reserve passagér
        static public function getAll_reserv_passagér(){
        $stmt = DB::connect()->prepare("SELECT *FROM réservation 
            INNER JOIN utilisateur ON utilisateur.id_utilisateur = réservation.id_utilisateur
            INNER JOIN vol ON vol.id_vol = réservation.id_vol 
            INNER JOIN passageres ON passageres.id = réservation.id ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
//        delete vol
        static public function Delete($id_vol){
            $id=$id_vol;
            try {
//                $stmt = DB::connect()->prepare("DELETE FROM vol WHERE id_vol=:id");
//                $stmt->execute(array(':id'=>$id));
//                $sql = "DELETE FROM users WHERE id=?";
                $stmt= DB::connect()->prepare("DELETE FROM vol WHERE id_vol=?");
                $stmt->execute([$id]);
                if ($stmt->execute()) {
                    return 1;
                } else {
                    return 0;
                }
            } catch (PDOException $ex) {
                echo 'erreur'.$ex->getMessage();
            }
        }
//        add vol
        static public function Add($vol){
            try {
                $stmt = DB::connect()->prepare("INSERT INTO vol(lieu_départ,lieu_arrivé,date_départ,date_arrivé,prix ,nombre_vol)
                VALUES(?,?,?,?,?,?)");
                $stmt->bindParam(1,$vol['lieu_départ']);
                $stmt->bindParam(2,$vol['lieu_arrivé']);
                $stmt->bindParam(3,$vol['date_départ']);
                $stmt->bindParam(4,$vol['date_arrivé']);
                $stmt->bindParam(5,$vol['prix']);
                $stmt->bindParam(6,$vol['nombre_vol']);
//                $conn = new mysqli("localhost","root","","brief-5");
//                $stmt = $conn->prepare("INSERT INTO vol (lieu_départ,lieu_d_arrivé,date_départ, date_d_arrivé,prix ,nombre_vol)
//                    values(?,?,?,?,?,?)");
//                $stmt->bind_param("sssssi", $vol['lieu_départ'], $vol['lieu_d_arrivé'],$vol['date_départ'], $vol['date_d_arrivé'], $vol['prix'], $vol['nombre_vol']);
//
                if ($stmt->execute()) {
                    return 1;
                } else {
                    return 0;
                }
            } catch (PDOException $ex) {
                echo 'erreur'.$ex->getMessage();
            }
        }
//        edit vol
        static public function Edit($vol){
        try {
            $stmt = DB::connect()->prepare("UPDATE vol SET  lieu_départ=?,lieu_arrivé=?,date_départ=?,date_arrivé=?
             ,prix=? ,nombre_vol=? where id_vol=?");
            $stmt->bindParam(1,$vol['lieu_départ']);
            $stmt->bindParam(2,$vol['lieu_arrivé']);
            $stmt->bindParam(3,$vol['date_départ']);
            $stmt->bindParam(4,$vol['date_arrivé']);
            $stmt->bindParam(5,$vol['prix']);
            $stmt->bindParam(6,$vol['nombre_vol']);
            $stmt->bindParam(7,$vol['id_vol']);
//                $conn = new mysqli("localhost","root","","brief-5");
//                $stmt = $conn->prepare("INSERT INTO vol (lieu_départ,lieu_d_arrivé,date_départ, date_d_arrivé,prix ,nombre_vol)
//                    values(?,?,?,?,?,?)");
//                $stmt->bind_param("sssssi", $vol['lieu_départ'], $vol['lieu_d_arrivé'],$vol['date_départ'], $vol['date_d_arrivé'], $vol['prix'], $vol['nombre_vol']);
//
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'erreur'.$ex->getMessage();
        }
        }
//      nombre de place resrvé de passagéres
        static public function calcul_nombre_place_de_passagéres($id){
        $id=$id;
        try {
            $stmt= DB::connect()->prepare("SELECT COUNT(*) as Resultat_nombre_place FROM passageres  WHERE id=?");
            if ($stmt->execute(array($id))) {
                $array_nombre_place = $stmt->fetch();
                return $array_nombre_place;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'erreur'.$ex->getMessage();
        }
    }

//      nombre de place resrvé de passagéres
        static public function calcul_nombre_place_rest_vol($id_vol){
        $id=$id_vol;
        try {
            $stmt= DB::connect()->prepare("SELECT COUNT(*) as count_user_reservation, 
                (SELECT COUNT(*) FROM `passageres` INNER JOIN réservation ON passageres.id = réservation.id WHERE id_vol = ?) 
                    as count_passageres_reservation FROM `réservation` WHERE id_vol=?");
            if ($stmt->execute(array($id, $id))) {
                $array_nombre_place_reserve = $stmt->fetch();
                return $array_nombre_place_reserve;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'erreur'.$ex->getMessage();
        }
        }


//      nombre de place resrvé de passagéres
        static public function vol_routeur($arrivé, $départ){
            try {
                $stmt= DB::connect()->prepare("SELECT COUNT(*) as count_vol_routeur FROM `vol` WHERE lieu_arrivé=? AND lieu_départ=?");
                if ($stmt->execute(array($arrivé, $départ))) {
                    $array_vol_routeur = $stmt->fetch();
                    return $array_vol_routeur['count_vol_routeur'];
                } else {
                    return 0;
                }
            } catch (PDOException $ex) {
                echo 'erreur'.$ex->getMessage();
            }
        }

//      return id de cherche vol
            static public function id_vol_routeur($arrivé, $départ){
                try {
                    $stmt= DB::connect()->prepare("SELECT *FROM `vol` WHERE lieu_arrivé=? AND lieu_départ=?");
                    if ($stmt->execute(array($arrivé, $départ))) {
                        $id=$stmt->fetch();
                        return $id;
                    } else {
                        return 0;
                    }
                } catch (PDOException $ex) {
                    echo 'erreur'.$ex->getMessage();
                }
            }
}

?>