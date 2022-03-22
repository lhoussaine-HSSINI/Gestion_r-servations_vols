<?php
if ($_SESSION["id_user"]!==1 && $_SESSION['admin_bool']===false && $_SESSION['admin']===''&&
    $_SESSION['user_bool']===true && $_SESSION['user']==='user'&&$_SESSION['statut']===0):
if(isset($_POST['submit_delete'])) {
    $delete = new Reservation_controllers();
    $delete->delete_reservé();
}
if(isset($_POST['Add_passagers'])) {
    $delete = new Reservation_controllers();
    $delete->Add_passager_reservé();
}
$data = new Reservation_controllers();
$reservation=$data->getAllReservation();
$data = new Vol_controllers();
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
                <a class="  nav-link" href="Home" aria-label="lien Home">Vol</a>
                <a class=" nav-link" href="Reservation" aria-label="lien Reservation">Réservation</a>
                <a class=" nav-link" href="Logout" aria-label="lien Logut"><img src="Image/logout.svg" class="img-circle" alt="Logut"> </a>
            </nav>
        </div>
    </header>
    <div class="container d-flex w-100 h-100 mt-4 p-1 mx-auto flex-column">
        <!-- start tableau de reservation -->
        <div class="card text-center">
        <!-- <div class="d-flex justify-content-evenly mt-1 mb-1">  -->
            
            <a href="Passager" class=" btn bg_btn_tout_passager bg_btn_ajouter_passager btn-sm d-flex align-items-center"  aria-label="lien Passageres" >
                 <i id="passager_plus" class="mt-1 fas fa-eye"></i> passagéres 
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
                                <th scope="col">Type</th>
                                <th scope="col">Nombre placce</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $i=1 ;?>
                        <?php  foreach ($reservation as $value) :?>
                        <?php if ($value["id_utilisateur"]==$_SESSION["id_user"]) :?>
                            <tr>
                                <th scope="row" class="id_reservation"><?php echo $i ;?></th>
                                <td><?php echo $value["lieu_départ"];?></td>
                                <td><?php echo $value["lieu_arrivé"];?></td>
                                <td><?php echo $value["Type_de_vol"];?></td>
                                <td><?php echo $data->calcul_nombre_place($value["id"]);?></td>
                                <td><?php echo $data->calcul_nombre_place($value["id"])*$value["prix"];?> DH</td>
                                <td class="d-flex flex-row align-items-center justify-content-center">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#delete<?php echo $value["id"];?>" aria-label="#" >
                                    <!-- <img class="size-action" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/4a90e2/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png" alt="#" /> -->
                                    <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                        <!-- <img class="size-action" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/4a90e2/external-edit-interface-kiranshastry-solid-kiranshastry-1.png" alt="#" /> -->
                                    
                                    <a href="#" class="btn_voir_ma_reserve" data-bs-toggle="modal" data-bs-target="#reserve<?php echo $value["id"];?>" aria-label="#" >
                                        <!-- <img class="size-action" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/4a90e2/external-view-cyber-security-kiranshastry-solid-kiranshastry-3.png" alt="#" /> -->
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn bg_btn_ajouter_passager btn-sm d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#ajouter_passagers<?php echo $value["id"];?>"  aria-label="hhh" href="#"><i class="fa-solid fa-plus" id="passager_plus"></i> passagéres </a>
                                </td>
                                <!-- start Modal ajouter passagers-->
                                <div class="modal fade" id="ajouter_passagers<?php echo $value["id"];?>"aria-hidden="true">
                                        <div class="modal-dialog">
                                            <!-- start test card passagers -->
                                            <div id='form' class="modal-content">
                                            <h3 id="form__head" class="mb-4 ">Ajouter un passagère</h3>
                                            <form id="newform"  method="POST"class="needs-validation" novalidate>
                                                <div class="form-group mt-1">
                                                    <label  for="exampleInputEmail1">Nom</label>
                                                    <input type="text" class="form-control" name="Nom_passagér" aria-describedby="emailHelp" placeholder="Nom" required>
                                                </div>
                                                <div class="form-group mt-1">
                                                    <label  for="exampleInputEmail1">Prénom</label>
                                                    <input type="text" class="form-control" name="Prénom_passagér" aria-describedby="emailHelp" placeholder="Prénom" required>
                                                </div>
                                                <div class="form-group mt-1">
                                                    <label  for="exampleInputPassword1">Date</label>
                                                    <input type="date" class="form-control" name="Date_de_naissance_passagér" placeholder="date" required>
                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $value["id"];?>">
                                                <button name='Add_passagers'type="submit" class="mt-2 btn btn-primary">Ajouter</button>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- end   card passagers  -->
                                        </div>
                                </div>
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
                                                            <small><span>19 : 21 ,</span> <?php echo $value["date_départ"];?> </small></div>
                                                        <div class="col-6 d-flex flex-column flex-nowrap ">
                                                            <strong><?php echo $value["lieu_arrivé"];?></strong>
                                                            <small><span>19 : 21 ,</span> <?php echo $value["date_arrivé"];?></small></div>
                                                    </div>
                                                    <div class="row align-items-cente mt-2">
                                                        <div class="col-7 d-flex flex-column flex-wrap after_span"><span> Nombre de places réservées</span><small><?php echo $value["nombre_placce"];?></small></div>
                                                        <div class="col d-flex flex-column flex-wrap after_span"><span> Prix</span><small><?php echo $value["prix"];?>DH</small></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-footer text-muted">
                                                <a href="#" class="btn btn-primary">Imprimer le ticket</a>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script> -->
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
