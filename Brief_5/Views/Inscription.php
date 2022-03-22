<?php 

if (isset($_POST['submit'])) {
    $data = new login_controller();
    $data->inscreption();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="FAHO">
    <meta name="author" content="lhoussaine hssini">
    <meta name="description" content="Avec nous, vous voyagerez confortablement">
    <meta name="Keywords" content="VOL, vol, reservation">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=“stylesheet”>
    <link rel="apple-touch-icon" sizes="180x180" href="Image/avion.webp">
    <title>Document</title>
</head>
  <body class="text-center">

  <section class="container-fluid b-g">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-5 mb-2">
                <form class=" form-inscrir" id="inscription" onsubmit="return validation()" name="inscription"  novalidate method="POST" >
                <img src="Image/logo_1.svg" alt="Cinque Terre">
				<div class="form-group d-flex flex-column align-items-start mt-1">
                        <label  for="exampleInputEmail1">Nom *</label>
                        <input type="text" class="form-control" name="nom" aria-describedby="emailHelp" placeholder="Nom" required>
                    </div>
					<div class="form-group d-flex flex-column align-items-start mt-1">
                        <label  for="exampleInputEmail1">Prénom *</label>
                        <input type="text" class="form-control" name="prénom" aria-describedby="emailHelp" placeholder="Prénom" required>
                    </div>
                    <div class="form-group d-flex flex-column align-items-start mt-1">
                        <label  for="exampleInputEmail1">Email address *</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                    </div>
					<div class="form-group d-flex flex-column align-items-start mt-1">
                        <label  for="exampleInputPassword1">Date de naissance *</label>
                        <input type="date" class="form-control" name="date_de_naissance" placeholder="Date" required>
                    </div>
                    <div class="form-group d-flex flex-column align-items-start mt-1">
                        <label  for="exampleInputPassword1">Password *</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button name="submit" type="submit" class="mt-2 btn btn-primary">S'inscrire</button>
                    <a href="Login"><span class="mt-2 btn btn-primary"> Connecter</span></a>
                </form>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript" src="js/validé_form.js"></script>
<script src="js/bootstrap.min.js "></script>
</html>