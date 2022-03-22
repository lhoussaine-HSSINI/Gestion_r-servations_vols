<?php
if ($_SESSION["id_user"]===1 && $_SESSION['admin_bool']===true && $_SESSION['admin']==='admin'&&
    $_SESSION['user_bool']===false && $_SESSION['user']===''&&$_SESSION['statut']===1):
if(isset($_POST['submit_delete'])) {
    $delete = new Reservation_controllers();
    $delete->delete_reservé();
}

$data_passager = new Reservation_controllers();
$passager=$data_passager->getAllReservation_passager();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="FAHO">
    <meta name="author" content="lhoussaine hssini">
    <meta name="description" content="Avec nous, vous voyagerez confortablement">
    <meta name="Keywords" content="VOL, vol, reservation">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=“stylesheet”>
    <link rel="apple-touch-icon" sizes="180x180" href="#">
    <title>passagéres</title>
</head>

<body class="text-center ">
<header class="navbar  navbar-expand mx-auto mb-2">
    <div class="container ">
        <a class="navbar-brand" href="Home">
            <img src="Image/logo_1.svg" alt="Cinque Terre"> </a>
        <nav class="nav navbar-nav ">
            <a class="  nav-link" href="Dashboard" aria-label="lien Home">Vol</a>
            <a class=" nav-link" href="Reservationadmin" aria-label="lien Reservation">Réservation</a>
            <a class=" nav-link" href="Logout" aria-label="lien Logut"><img src="Image/logout.svg" class="img-circle" alt="Logut"> </a>
        </nav>
    </div>
</header>
<div class="container d-flex w-100 h-100 mt-4 p-1 mx-auto flex-column">
    <!-- start tableau de passagéres -->
    <div class="card text-center">
        <a href="Reservationadmin" class=" btn bg_btn_tout_passager bg_btn_ajouter_passager btn-sm d-flex align-items-center"  aria-label="lien Reservation" >
            <i id="passager_plus" class="mt-1 fas fa-eye"></i> Réservation
        </a>
        <div class="card-header">
            passagéres
        </div>
        <div class="card-body  " id="card-body">
            <!-- <h5 class="card-title">Special title treatment</h5> -->
            <div class="table-responsive">
                <table class="table caption-top">
                    <!-- <caption>List of users</caption> -->
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom_passager</th>
                        <th scope="col">Prénom_passager</th>
                        <th scope="col">Date_de_naissance_passager</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $i=1 ;?>
                    <?php  foreach ($passager as $value) :?>
                            <tr>
                                <th scope="row" class="id_reservation"><?php echo $i;?></th>
                                <td><?php echo $value["Nom_passager"];?></td>
                                <td><?php echo $value["Prénom_passager"];?></td>
                                <td><?php echo $value["Date_de_naissance_passager"];?></td>
                            </tr>
                            <?php $i++;?>
                    <?php  endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end tableau de reservation -->
</div>


</body>

<script src="js/bootstrap.min.js "></script>
<script src="js/vol-reserve.js "></script>
<script>

</script>

</html>
<?php elseif ($_SESSION["id_user"]!==1 && $_SESSION['admin_bool']===false && $_SESSION['admin']===''
    && $_SESSION['user']==='user'&& $_SESSION['user_bool']===true &&$_SESSION['statut']===0): ;?>
<?php header("Location: Home ");;?>
<?php else: ;?>
    <?php header("Location: Login ");;?>
<?php endif ?>
