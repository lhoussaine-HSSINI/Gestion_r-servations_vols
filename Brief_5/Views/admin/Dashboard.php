<?php
if ($_SESSION["id_user"]===1 && $_SESSION['admin_bool']===true && $_SESSION['admin']==='admin'&&
    $_SESSION['user_bool']===false && $_SESSION['user']===''&&$_SESSION['statut']===1):
if(isset($_POST['delete_vol'])) {
    $delete = new Vol_controllers();
    $delete->Delete_vol();

}
if(isset($_POST['Add_vol'])) {
    $add_vols = new Vol_controllers();
    $add_vols->Add_vol();
}
if(isset($_POST['edit_vol'])) {
    $add_vols = new Vol_controllers();
    $add_vols->Edit_vol();
}
$data = new Vol_controllers();
$vol=$data->getAllVol();
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
    <title>Réservation</title>
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
    <!-- start tableau de vol -->
    <div class="card text-center">
        <!-- <div class="d-flex justify-content-evenly mt-1 mb-1">  -->

        <a href="#" class="bg_btn_ajouter_passager btn bg_btn_add_vol  btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#ajouter_vol" aria-label="ajouter vol" >
            <i class="fa-solid fa-plus" id="passager_plus"></i> vol </a>
        </a>


        <!-- </div> -->
        <div class="card-header">
            reservation
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
                        <th scope="col">date départ</th>
                        <th scope="col">date D'arrivé</th>
                        <th scope="col">nombre vol</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $i=1 ;?>
                    <?php  foreach ($vol as $value) :?>
                    <tr>


                        <td class="td_table_vol" scope="row" class="id_reservation"><?php echo $i ;?></td>
                        <td class="td_table_vol"><?php echo $value["lieu_départ"];?></td>
                        <td class="td_table_vol"><?php echo $value["lieu_arrivé"];?></td>
                        <td class="td_table_vol"><?php echo date('Y-m-d ', strtotime($value["date_départ"]));?></td>
                        <td class="td_table_vol"><?php echo date('Y-m-d ', strtotime($value["date_arrivé"]));?></td>
                        <td class="td_table_vol"><?php echo $value["nombre_vol"];?></td>
                        <td class="td_table_vol"><?php echo $value["prix"].' DH';?></td>
                        <td class="d-flex flex-row align-items-center justify-content-center">
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#delete<?php echo $value["id_vol"];?>" aria-label="#" >
                                <!-- <img class="size-action" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/4a90e2/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png" alt="#" /> -->
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                            <!-- <img class="size-action" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/4a90e2/external-edit-interface-kiranshastry-solid-kiranshastry-1.png" alt="#" /> -->

                            <a href="#" class="btn_voir_ma_reserve" data-bs-toggle="modal" data-bs-target="#reserve<?php echo $value["id_vol"];?>" aria-label="#" >
                                <!-- <img class="size-action" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/4a90e2/external-view-cyber-security-kiranshastry-solid-kiranshastry-3.png" alt="#" /> -->
                                <i class="fas fa-eye"></i>
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#edit_vol<?php echo $value["id_vol"];?>"  aria-label="edit_vol" href="#">
                                <i class="fas fa-edit"></i></a>
                        </td>
            <!-- start card information reservation modal-->
            <!-- Modal view information reservation-->
            <div class="modal fade" id="reserve<?php echo $value["id_vol"];?>" tabindex="-1" aria-labelledby="reservation" aria-hidden="true">
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
                                        <small><span><?php echo date('H:i', strtotime($value["date_départ"]));?> ,</span> <?php echo date('Y-m-d', strtotime($value["date_départ"]));?> </small></div>
                                    <div class="col-6 d-flex flex-column flex-nowrap ">
                                        <strong><?php echo $value["lieu_arrivé"];?></strong>
                                        <small><span><?php echo date('H:i', strtotime($value["date_arrivé"]));?> ,</span> <?php echo date('Y-m-d', strtotime($value["date_arrivé"]));?></small></div>
                                </div>
                                <div class="row align-items-cente mt-2">
                                    <div class="col-7 d-flex flex-column flex-wrap after_span"><span> Nombre de places réservées</span><small><?php echo $value["nombre_vol"];?></small></div>
                                    <div class="col d-flex flex-column flex-wrap after_span"><span> Prix</span><small><?php echo $value["prix"];?>DH</small></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end   card information reservation -->
                </div>
            </div>
            <!-- end card information reservation modal -->
            <!-- start Modal delete information reservation-->
            <div class="modal fade" id="delete<?php echo $value["id_vol"];?>"aria-hidden="true">
                <div class="modal-dialog">
                    <!-- start test card information de vol -->
                    <div id='form' class="modal-content">
                        <h3 id="form__head" class="mb-4 ">supprimer vol</h3>
                        <form id="newform"  method="POST" class="needs-validation">
                            <input type="hidden" name="id" value="<?php echo $value["id_vol"];?>">
                            <div class="d-flex flex-row justify-content-evenly">
                                <button name='delete_vol'type="submit" class="btn btn-primary">Oui</button>
                                <button name='submit_non_delete'type="submit" class="btn btn-primary bg-danger">Non</button>
                            </div>
                        </form>
                    </div>
                    <!-- end   card information reservation -->
                </div>
            </div>
            <!-- end modal delete reservation modal -->
            <!-- start Modal edit vol-->
            <div class="modal fade" id="edit_vol<?php echo $value["id_vol"];?>"aria-hidden="true">
                            <div class="modal-dialog">
                                <!-- start test card passagers -->
                                <div id='form' class="modal-content">
                                    <h3 id="form__head" class="mt-1 ">Ajouter un vol</h3>
                                    <form id="newform"  method="POST" class="needs-validation" novalidate>
                                        <div class="form-group mt-1">
                                            <label  for="exampleInputEmail1">Lieu départ</label>
                                            <input type="text" class="form-control" name="lieu_départ" value="<?php echo $value["lieu_départ"];?>" aria-describedby="emailHelp" placeholder="Lieu départ" required>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label  for="exampleInputEmail1">Lieu d'arrivé</label>
                                            <input type="text" class="form-control" name="lieu_arrivé" value="<?php echo $value["lieu_arrivé"];?>" aria-describedby="emailHelp" placeholder="Lieu d'arrivé" required>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label>Date départ</label>
                                            <input type="datetime-local" class="form-control" name="date_départ"value="<?php echo date('Y-m-d\TH:i:s', strtotime($value["date_départ"]));?>" placeholder="Date départ" required/>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label> Date d'arrivé</label>
                                            <input type="datetime-local" class="form-control" name="date_arrivé" value="<?php echo date('Y-m-d\TH:i:s', strtotime($value["date_arrivé"]));?>" placeholder="Date d'arrivé" required/>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label>Prix</label>
                                            <input type="number" class="form-control" name="prix" placeholder="Prix" value="<?php echo $value["prix"];?>"required/>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label>Nombre places de vol</label>
                                            <input type="number" class="form-control" name="nombre_vol"  value="<?php echo $value["nombre_vol"];?>"placeholder="Nombre places de vol" required/>
                                        </div>
                                        <input type="hidden" name="id_vol" value="<?php echo $value["id_vol"];?>">
                                        <button name='edit_vol'type="submit" class="mt-2 btn btn-primary">Ajouter</button>
                                </div>
                                </form>
                            </div>
                            <!-- end   card passagers  -->
                        </div>
            </div>
            <!-- end modal edit vol -->
            </tr>
            <?php  $i++ ;?>
            <?php  endforeach;?>

            </tbody>
            </table>
        </div>
    </div>
</div>
            <!-- start Modal ajouter vol-->
            <div class="modal fade" id="ajouter_vol"aria-hidden="true">
                <div class="modal-dialog">
                    <!-- start test card passagers -->
                    <div id='form' class="modal-content">
                        <h3 id="form__head" class="mt-1 ">Ajouter un vol</h3>
                        <form id="newform"  method="POST" class="needs-validation" novalidate>
                            <div class="form-group mt-1">
                                <label  for="exampleInputEmail1">Lieu départ</label>
                                <input type="text" class="form-control" name="lieu_départ" aria-describedby="emailHelp" placeholder="Lieu départ" required>
                            </div>
                            <div class="form-group mt-1">
                                <label  for="exampleInputEmail1">Lieu d'arrivé</label>
                                <input type="text" class="form-control" name="lieu_arrivé" aria-describedby="emailHelp" placeholder="Lieu d'arrivé" required>
                            </div>
                            <div class="form-group mt-1">
                                <label>Date départ</label>
                                <input type="datetime-local" class="form-control" name="date_départ" placeholder="Date départ" required/>
                            </div>
                            <div class="form-group mt-1">
                                <label> Date d'arrivé</label>
                                <input type="datetime-local" class="form-control" name="date_arrivé" placeholder="Date d'arrivé" required/>
                            </div>
                            <div class="form-group mt-1">
                                <label>Prix</label>
                                <input type="number" class="form-control" name="prix" placeholder="Prix" required/>
                            </div>
                            <div class="form-group mt-1">
                                <label>Nombre places de vol</label>
                                <input type="number" class="form-control" name="nombre_vol"  placeholder="Nombre places de vol" required/>
                            </div>
                            <button name='Add_vol'type="submit" class="mt-2 btn btn-primary">Ajouter</button>
                    </div>
                    </form>
                </div>
                <!-- end   card passagers  -->
            </div>
            </div>
            <!-- end modal ajouter vol -->

<!-- end tableau de vol -->
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