<?php
require_once 'core/init.php';

$user = new User;
if(!$user->isLoggedIn()) {
    Redirect::redirectTo('sign.php');
}

?>

<div class="my-navbar">
    <div class="container">
        <div class="navbar-items">
            <ul>
                <li class="pull-right" onclick="openNav()"><i class="fa fa-reorder"></i></li>
            </ul>
        </div>
    </div>
</div>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<div class="container">
    <div class="messages">
        <div class="message"></div>
    </div>
</div>





<?php
include 'includes\templates\footer.php';
?>