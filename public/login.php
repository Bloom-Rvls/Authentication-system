<?php
require '../vendor/autoload.php';

use App\App;
use App\Auth;

session_start();

$auth = App::getAuth();

/*if($auth->user() !== null) {
    header('Location: index.php');
    exit();
}*/

$error = false;

if(!empty($_POST)) {
    $user = $auth->login($_POST['username'], $_POST['password']);
    if ($user) {
        header('Location: index.php?login=1');
        exit();
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="p-4">
 
    <h1>Se connecter</h1>

    <?php if($error): ?>
        <div class="alert alert-danger">
            Identifiant ou mot de passe incorrect
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['forbid'])): ?>
        <div class="alert alert-danger">
            l'acces à la page est interdit
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-group mb-2">
            <input type="text" class="form-control" name="username" placeholder="Pseudo">
        </div>
        <div class="form-group mb-2">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
        </div>
        <button class="btn btn-primary mb-4">Se connecter</button>
    </form>
   <?php dump($_SESSION)?>
    
</body>
</html>