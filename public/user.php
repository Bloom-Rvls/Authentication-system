<?php
use App\App;

require "../vendor/autoload.php";

App::getAuth()->requireRole('user', 'admin');
?>

page réservée à l'utilisateur