<?php
use App\App;

require "../vendor/autoload.php";

$user = App::getAuth()->user();
if ($user === null || $user->role !== "admin") {
    header('Location: index.php?forbid=1');
    exit();
}

?>

page réservée à l'administrateur