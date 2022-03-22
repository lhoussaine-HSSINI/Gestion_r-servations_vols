<?php 
class Reservation_controllers{
        public function getAllReservation(){
            $reservation= Reservation::getAll();
            return $reservation;
        }
        public function getAllReservation_passager(){
            $passager= Reservation::getAll_passager();
            return $passager;
        }
        public function delete_reservé(){
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                echo $id;
                $resul_delete=Reservation::delete($id);
                if ($resul_delete==1) {
                    header("Location: Reservation");
                }else {
                    echo $resul_delete;
                }
            }
        }
        public function delete_reservé_passager(){
            if(isset($_POST['id_passager'])){
                $id = $_POST['id_passager'];
                $resul_delete=Reservation::delete_passager($id);
                if ($resul_delete==1) {
                    header("Location: Passager");
                }else {
                    echo $resul_delete;
                }
            }
        }
        public function Add_reservé(){
            if(isset($_POST['id_vol'])&& isset($_POST['Type_de_vol']) && isset($_POST['id_routeur_vol'])){
                $reserve_vol=array(
                'id_vol' => $_POST['id_vol'],
                'id_utilisateur' => $_SESSION["id_user"],
                'Type_de_vol' => 'Aller',
                );
                if ($_POST['Type_de_vol']=='Routeur' && isset($_POST['id_routeur_vol'])){
                    $reserve_vol_routeur=array(
                        'id_vol' => $_POST['id_routeur_vol'],
                        'id_utilisateur' => $_SESSION["id_user"] ,
                        'Type_de_vol' => $_POST['Type_de_vol'],
                    );
                    $resul_Add_routeur=Reservation::Add($reserve_vol_routeur);
                }
                $resul_Add=Reservation::Add($reserve_vol);
                if ($resul_Add===1 || $resul_Add_routeur===1) {
                    header("Location: Reservation");
                }else {
                    echo $resul_Add;
                }
            }
        }
        public function Add_passager_reservé(){
            if(isset($_POST['Nom_passagér'])&& isset($_POST['Prénom_passagér'])&& isset($_POST['Date_de_naissance_passagér'])&&isset($_POST['id'])){
                $passager_reserve_vol=array(
                'Nom_passager' => $_POST['Nom_passagér'],
                'Prenom_passager' => $_POST['Prénom_passagér'],
                'Date_de_naissance_passager' => $_POST['Date_de_naissance_passagér'],
                'Id'=> number_format($_POST['id']),
                );
                $resul_Add=Reservation::Add_passager($passager_reserve_vol);
                if ($resul_Add===1) {
                    header("Location: Reservation");
                }else {
                    echo $resul_Add;
                }
            }
        }
}
?>
