<?php
if ($_SESSION["id_user"]!==1 && $_SESSION['admin_bool']===false && $_SESSION['admin']===''&&
    $_SESSION['user_bool']===true && $_SESSION['user']==='user'&&$_SESSION['statut']===0):
if(isset($_POST['submit_delete'])) {
    $delete = new Reservation_controllers();
    $delete->delete_reservé_passager();
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
                <a class="  nav-link" href="Home" aria-label="lien Home">Vol</a>
                <a class=" nav-link" href="Reservation" aria-label="lien Reservation">Réservation</a>
                <a class=" nav-link" href="Logout" aria-label="lien Logut"><img src="Image/logout.svg" class="img-circle" alt="Logut"> </a>
            </nav>
        </div>
    </header>
    <div class="container d-flex w-100 h-100 mt-4 p-1 mx-auto flex-column">
        <!-- start tableau de passagéres -->
        <div class="card text-center">
            <a href="Reservation" class=" btn bg_btn_tout_passager bg_btn_ajouter_passager btn-sm d-flex align-items-center"  aria-label="lien Reservation" >
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
                                <th scope="col">Lieu Départ</th>
                                <th scope="col">Lieu D'arrivé</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $i=1 ;?>
                        <?php  foreach ($passager as $value) :?>
                            <?php if ($value["id_utilisateur"] == $_SESSION["id_user"] ):?>
                            <tr>
                                <th scope="row" class="id_reservation"><?php echo $i;?></th>
                                <td><?php echo $value["lieu_départ"];?></td>
                                <td><?php echo $value["lieu_arrivé"];?></td>
                                <td class="d-flex flex-row align-items-center justify-content-center">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#delete<?php echo $value["id_passager"];?>" aria-label="#" ><i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    <a href="#" class="btn_voir_ma_reserve" data-bs-toggle="modal" data-bs-target="#reserve<?php echo $value["id"];?>" aria-label="#" ><i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <!-- start Modal ajouter passagers-->

                                <!-- end modal ajouter passagers -->
                                <!-- start card information reservation modal-->
                                <!-- Modal view information reservation-->
                                <div class="modal fade" id="reserve<?php echo $value["id"];?>" tabindex="-1" aria-labelledby="reservation" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <!-- start test card information de vol -->
                                        <div class="card text-center  mt-3">
                                            <div class="card-header">
                                                Données de vol
                                            </div>
                                            <div class="card-body ">
                                                <div class="d-flex justify-content-around flex-wrap surce-distination-info">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="font-size-reservation"> <strong> Départ&nbsp;: &nbsp; </strong> </div>
                                                        <small><?php echo $value["lieu_départ"];?> - <?php echo $value["lieu_arrivé"];?></small>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <small>Temps de vol : 11 heures 25 minutes</small>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="row align-items-center mt-2">
                                                        <div class="col-6 font-size-reservation"><strong>Départ</strong></div>
                                                        <div class="col-6 font-size-reservation"><strong>D'arrivé</strong></div>
                                                    </div>
                                                    <hr class="mt-1 line-in-donne-de-vol">
                                                    <div class="row align-items-center">
                                                        <div class="col-6 d-flex flex-column flex-nowrap ">
                                                            <strong><?php echo $value["lieu_départ"];?></strong>
                                                            <small><span></span> <?php echo $value["date_départ"];?> </small></div>
                                                        <div class="col-6 d-flex flex-column flex-nowrap ">
                                                            <strong><?php echo $value["lieu_arrivé"];?></strong>
                                                            <small><span></span> <?php echo $value["date_arrivé"];?></small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end   card information reservation -->
                                    </div>
                                </div>
                                <!-- end card information reservation modal -->
                                <!-- start Modal delete passager-->
                                <div class="modal fade" id="delete<?php echo $value["id_passager"];?>"aria-hidden="true">
                                    <div class="modal-dialog">
                                        <!-- start test card information de vol -->
                                        <div id='form' class="modal-content">
                                        <h3 id="form__head" class="mb-4 ">supprimer reservé de passaéres</h3>
                                        <form id="newform"  method="POST"class="needs-validation">
                                            <input type="hidden" name="id_passager" value="<?php echo $value["id_passager"];?>">
                                            <div class="d-flex flex-row justify-content-evenly">
                                            <button name='submit_delete'type="submit" class="btn btn-primary">Oui</button>
                                            <button name='submit_non_delete'type="submit" class="btn btn-primary bg-danger">Non</button>
                                            </div>
                                        </form>
                                    </div>
                                        <!-- end   card information reservation -->
                                    </div>
                                </div>
                                <!-- end modal delete passager -->
                            </tr>
                            <?php $i++;?>
                            <?php endif ?>
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
<?php elseif ($_SESSION["id_user"]===1 && $_SESSION['admin_bool']===true && $_SESSION['admin']==='admin'
    && $_SESSION['user']===''&& $_SESSION['user_bool']===false &&$_SESSION['statut']===1): ;?>
<?php header("Location: Dashboard ");;?>
<?php else: ;?>
    <?php header("Location: Login ");;?>
<?php endif ?>
