<?php
use App\App;

require "../vendor/autoload.php";

App::getAuth()->requireRole('admin');
?>

page réservée à l'administrateur