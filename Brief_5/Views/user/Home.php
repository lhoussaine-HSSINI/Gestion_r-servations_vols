<?php
if ($_SESSION["id_user"]!==1 && $_SESSION['admin_bool']===false && $_SESSION['admin']===''&&
    $_SESSION['user_bool']===true && $_SESSION['user']==='user'&&$_SESSION['statut']===0):
if(isset($_POST['reserve'])) {
    $delete = new Reservation_controllers();
    $delete->Add_reservé();
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
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=“stylesheet”>
    <link rel="apple-touch-icon" sizes="180x180" href="#">


    <title>Document</title>
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
    <div class="container d-flex w-100 h-100 mt-4  mx-auto flex-column">
        <div class="row">
        <?php  foreach ($vol as $value) :
            if ($value["nombre_vol"]-$data->calcul_nombre_place_rest_vol_user_passager($value["id_vol"])!=0):?>
            <div class="col-lg-6 mb-2  col-md-6 col-sm-12">
                <div class="card border-top">
                    <div class="card-header bg-body ">
                        <div class="row">
                            <div class="col-4 d-flex flex-column align-items-stretch">
                                <span class="d-block aller">
                                    <strong>
                                        <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/ffffff/external-flight-camping-kiranshastry-solid-kiranshastry.png" alt="#" width="29" height="29"/>
                                    </strong> 
                                    <em class="d-inline-block">Vols</em>
                                </span>
                                <small class="d-block date"><?php echo date('Y-m-d ', strtotime($value["date_départ"]));?></small>
                            </div>
                            <div class="col-4 "><strong><?php echo $value['lieu_départ'];?></strong>

                            </div>
                            <div class="col-4 "><strong><?php echo $value["lieu_arrivé"];?></strong>

                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-3"><?php echo date('H:i:s ', strtotime($value["date_départ"]));?>
                                <small class="d-block "><?php echo $value['lieu_départ'];?></small>
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <strong>
                                    <img src="https://img.icons8.com/ios-filled/50/fa314a/airplane-mode-on.png" alt="#" width="29" height="29"/>
                                </strong>
                                <hr>
                                <small class="d-block">Temps de vol 15 heures 25 minutes</small>
                                <strong id="nombre_place"><?php echo $value["nombre_vol"]-$data->calcul_nombre_place_rest_vol_user_passager($value["id_vol"]);?> places restantes</strong>
                            </div>
                            <div class="col-3">
                            <?php echo date('H:i:s ', strtotime($value["date_arrivé"]));?>
                                <small class="d-block "><?php echo $value["lieu_arrivé"];?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted border-0 p-1 d-flex flex-row justify-content-evenly align-items-center">
                        <span class="price">
                            <strong><?php echo $value["prix"];?> DH</strong>
                        </span>
                        <button type="button" data-bs-target="#reserve<?php echo $value["id_vol"];?>"class="btn btn-tafasil" data-bs-toggle="modal" >Reserve maintenant </button>
                    </div>
                </div>
                <!-- Modal -->
            <div class="modal fade" id="reserve<?php echo $value["id_vol"];?>" tabindex="-1" aria-labelledby="reserve">
                <div class="modal-dialog">
                    <div id='form' class="modal-content">
                        <h3 id="form__head" class="mb-4 ">reservation de vol</h3>
                        <form id="newform"  method="POST" class="needs-validation" novalidate>
                            <div class="form-group p-1">
                                <select class="form-select" id="Type_de_vol" name="Type_de_vol" required placeholder="Type de vol">
                                        <option value="">Type de vol</option>
                                        <option value="Aller">Aller</option>
                                    <?php if($data->si_vol_routeur($value["lieu_départ"],$value["lieu_arrivé"])):?>
                                        <option value="Routeur">Routeur</option>
                                    <?php endif ?>
                                </select>
                                <div class="invalid-feedback">Veuillez saisir Type de vol</div>
                            </div>
                            <input type="hidden" name="id_routeur_vol" value="<?php echo $data->get_id_vol_routeur($value["lieu_départ"],$value["lieu_arrivé"]);?>">
                            <input type="hidden" name="id_vol" value="<?php echo $value["id_vol"];?>">
                            <button name="reserve" type="submit" class=" mt-4 d-block w-100 btn btn-primary">Validé</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            
            <?php  endif;
                   endforeach; ?>
        </div>
    </div>
    
</body>
<script src="js/bootstrap.min.js "></script>
<script src="js/vol-reserve.js "></script>
</html>
<?php elseif ($_SESSION["id_user"]===1 && $_SESSION['admin_bool']===true && $_SESSION['admin']==='admin'
    && $_SESSION['user']===''&& $_SESSION['user_bool']===false &&$_SESSION['statut']===1): ;?>
<?php header("Location: Dashboard ");;?>
<?php else: ;?>
    <?php header("Location: Login ");;?>
<?php endif ?>