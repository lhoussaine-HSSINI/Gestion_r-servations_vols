<?php 

class  Reservation
{
        static public function getAll(){
            $stmt = DB::connect()->prepare("SELECT *FROM réservation 
            INNER JOIN utilisateur ON utilisateur.id_utilisateur = réservation.id_utilisateur
            INNER JOIN vol ON vol.id_vol = réservation.id_vol ");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        static public function getAll_passager(){
            $stmt = DB::connect()->prepare("SELECT *FROM passageres 
            INNER JOIN réservation ON réservation.id = passageres.id 
            INNER JOIN vol ON vol.id_vol = réservation.id_vol ");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        static public function delete($id_reservé){
                $id=$id_reservé;
                try {
                     $stmt = DB::connect()->prepare("DELETE FROM réservation WHERE id=:id");
                     $stmt->execute(array(':id'=>$id));
                     if ($stmt->execute()) {
                             return 1;
                         } else {
                             return 0;
                         }				
                } catch (PDOException $ex) {
                    echo 'erreur'.$ex->getMessage();
                }
        }
        static public function delete_passager($id_passager){
        $id=$id_passager;
        try {
            $stmt = DB::connect()->prepare("DELETE FROM passageres WHERE id_passager=:id");
            $stmt->execute(array(':id'=>$id));
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'erreur'.$ex->getMessage();
        }
    }
        static public function Add($reserve_vol){
            try {
                 $stmt = DB::connect()->prepare("INSERT INTO réservation 
                 (id_utilisateur,id_vol,Type_de_vol)
                 VALUES(:id_utilisateur,:id_vol,:Type_de_vol)");
                 $stmt->bindParam(':id_utilisateur',$reserve_vol['id_utilisateur']);
                 $stmt->bindParam(':id_vol',$reserve_vol['id_vol']);
                 $stmt->bindParam(':Type_de_vol',$reserve_vol['Type_de_vol']);
                 if ($stmt->execute()) {
                         return 1;
                     } else {
                         return 0;
                     }	
            } catch (PDOException $ex) {
                echo 'erreur'.$ex->getMessage();
            }
        }
        static public function Add_passager($prv){
            try {
                 $stmt = DB::connect()->prepare("INSERT INTO passageres(Nom_passager, Prénom_passager, Date_de_naissance_passager, id)
                 VALUES(:Nom_passager,:Prenom_passager,:Date_de_naissance_passager,:Id)");
                 $stmt->bindParam(':Nom_passager',$prv['Nom_passager']);
                 $stmt->bindParam(':Prenom_passager', $prv['Prenom_passager']);
                 $stmt->bindParam(':Date_de_naissance_passager',$prv['Date_de_naissance_passager']);
                 $stmt->bindParam(':Id',$prv['Id']);
                 if ($stmt->execute()) {
                         return 1;
                     } else {
                         return 0;
                     }	
            } catch (PDOException $ex) {
                echo 'erreur'.$ex->getMessage();
            }
        }
}
?>