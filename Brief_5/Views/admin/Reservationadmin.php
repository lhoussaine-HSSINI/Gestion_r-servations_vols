<?php
if ($_SESSION["id_user"]===1 && $_SESSION['admin_bool']===true && $_SESSION['admin']==='admin'&&
    $_SESSION['user_bool']===false && $_SESSION['user']===''&&$_SESSION['statut']===1):
$data = new Vol_controllers();
$reservation=$data->getAllReservation_vol();
$reservation_passagér=$data->getAllReservation_passaér_vol();
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
    <meta http-equiv="Cache-control" content="public">
    <link rel="stylesheet"  href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=“stylesheet”>
    <link rel="apple-touch-icon" sizes="180x180" href="#">
    <title>Réservation</title>

</head>

<body class="text-center ">
<header class="navbar  navbar-expand mx-auto mb-2 ">
    <div class="container ">
        <a class="navbar-brand" href="Dashboard">
            <img src="Image/logo_1.svg" alt="Cinque Terre"> </a>
        <nav class="nav navbar-nav ">
            <a class="  nav-link" href="Dashboard" aria-label="lien Home">Vol</a>
            <a class=" nav-link" href="Reservationadmin" aria-label="lien Reservation">Réservation</a>
            <a class=" nav-link" href="Logout" aria-label="lien Logut"><img src="Image/logout.svg" class="img-circle" alt="Logut"> </a>
        </nav>
    </div>
</header>
<div class="container d-flex w-100 h-100 mt-4 p-1 mx-auto flex-column">
    <!-- start tableau de reservation -->
    <div class="card text-center">
        <!-- <div class="d-flex justify-content-evenly mt-1 mb-1">  -->

        <a href="toutreservation" class=" btn bg_btn_tout_passager bg_btn_ajouter_passager btn-sm d-flex align-items-center"  aria-label="lien Passageres" >
            <i id="passager_plus" class="mt-1 fas fa-eye"></i> passagéres
        </a>
        <!-- </div> -->
        <div class="card-header">
            reservation
        </div>
        <div class="card-body " id="card-body">
            <!-- <h5 class="card-title">Special title treatment</h5> -->
            <div class="table-responsive">
                <table class="table caption-top">
                    <!-- <caption>List of users</caption> -->
                    <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nombre placce</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $i=1 ;?>
                    <?php  foreach ($reservation as $value) :?>
                    <tr>
                        <th scope="row" class="id_reservation"><?php echo $i ;?></th>
                        <td><?php echo $value["nom"];?></td>
                        <td><?php echo $value["prénom"];?></td>
                        <td><?php echo $data->calcul_nombre_place($value["id"]);?></td>
                        <td class="d-flex flex-row align-items-center justify-content-center">
                            <a class="btn bg_btn_ajouter_passager btn-sm d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#reserve<?php echo $value["id"];?>"  aria-label="hhh" href="#">
                                <i id="passager_plus" class="mt-1 fas fa-eye"></i> passagéres </a>
                        </td>
            <!-- start card information reservation modal-->
            <!-- Modal view information reservation-->
            <div class="modal fade" id="reserve<?php echo $value["id"];?>" tabindex="-1" aria-labelledby="reservation" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- start test card information de vol -->
                    <div class="card text-center  mt-3">
                        <div class="card-header">
                            passagére de reservation
                        </div>
                        <div class="card-body ">
                            <?php  $j=1 ;?>
                            <?php  foreach ($reservation_passagér as  $passagér) :?>
                            <?php if ($value["id"] ===$passagér["id"]) :?>
                            <?php  echo $j ;?>
                            <div>
                                <span>Nom :</span> <?php echo  $passagér["Nom_passager"].'<br>';?>
                                <span>Prénom :</span> <?php echo $passagér["Prénom_passager"].'<br>';?>
                                <span>Date de naissance :</span> <?php echo  $passagér["Date_de_naissance_passager"].'<br>';?>
                            </div>
                                <?php  $j++ ;?>
                            <?php endif ?>
                            <?php  endforeach;?>
                        </div>

                    </div>
                    <!-- end   card information reservation -->
                </div>
            </div>
            <!-- end card information reservation modal -->
            <!-- start Modal delete information reservation-->
            <div class="modal fade" id="delete<?php echo $value["id"];?>"aria-hidden="true">
                <div class="modal-dialog">
                    <!-- start test card information de vol -->
                    <div id='form' class="modal-content">
                        <h3 id="form__head" class="mb-4 ">supprimer reservation</h3>
                        <form id="newform"  method="POST"class="needs-validation">
                            <input type="hidden" name="id" value="<?php echo $value["id"];?>">
                            <div class="d-flex flex-row justify-content-evenly">
                                <button name='submit_delete'type="submit" class="btn btn-primary">Oui</button>
                                <button name='submit_non_delete'type="submit" class="btn btn-primary bg-danger">Non</button>
                            </div>
                        </form>
                    </div>
                    <!-- end   card information reservation -->
                </div>
            </div>
            <!-- end modal delete reservation modal -->
            </tr>
            <?php  $i++ ;?>
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
<!--<script src="js/vol-reserve.js "></script>-->
<script>

</script>

</html>
<?php elseif ($_SESSION["id_user"]!==1 && $_SESSION['admin_bool']===false && $_SESSION['admin']===''
    && $_SESSION['user']==='user'&& $_SESSION['user_bool']===true &&$_SESSION['statut']===0): ;?>
<?php header("Location: Home ");;?>
<?php else: ;?>
    <?php header("Location: Login ");;?>
<?php endif ?>