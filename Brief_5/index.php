<?php
require_once './Autoloade.php';
//require_once './constant_base_url.php';
// require_once './Controllers/Home_controllers.php';

$home=new Home_controllers();

$pages=[ 'Login','Logout','Home','Reservation','Passager','login_controller', 'Dashboard', 'Reservationadmin','toutreservation'];

    if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_GET['page']) !== null ){
        if (isset($_GET['page'])) {
            if (in_array($_GET['page'], $pages)) {
                $page=$_GET['page'];
                $home->index($page);
            }else if ($_GET['page']=='Login'){
                $home->index('Home');
            } else {
                $home->index('404');
            }
        }
    }
    else if(isset($_GET['page']) && $_GET['page']==='Inscription'){
        $home->index('Inscription');
    }
    else{
        $home->index('Login');
    }
?>