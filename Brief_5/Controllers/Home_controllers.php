<?php
class Home_controllers{
    public function index($page)
    {
        if ($page==='Dashboard'||$page==='Reservationadmin'||$page==='toutreservation'){
        include 'Views/admin/' . $page . '.php';
        }else if ($page==='Home'||$page==='Reservation'||$page==='Passager'||$page==='serch'){
            include 'Views/user/'. $page . '.php';
        }else{
            include 'Views/'. $page .'.php';
        }
    }
}