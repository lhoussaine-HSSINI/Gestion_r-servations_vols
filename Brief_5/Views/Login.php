<?php 

if(isset($_POST['submit'])) {
    $data = new login_controller();
    $data->Connecter();
}
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
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=“stylesheet”>
    <link rel="apple-touch-icon" sizes="180x180" href="Image/avion.webp">
    <title>Document</title>
</head>

<body class="text-center ">
    <section class="container-fluid b-g">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-5 mb-2">
                <form class="form-container"method="POST">
                <img src="Image/logo_1.svg" alt="Cinque Terre">
                    <div class="form-group mt-1">
                        <label class="mb-2" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group mt-1">
                        <label class="mb-2" for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button name="submit"  type="submit" class="mt-2 btn btn-primary">Connecter</button>
                    <a href="Inscription"><span class="mt-2 btn btn-primary">S'inscrire</span></a>
                </form>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js "></script>

</html>