
<?php
require "../vendor/autoload.php";

use App\App;
use App\Auth;

$users = App::getPDO()->query("SELECT * FROM users")->fetchAll();

$auth = App::getAuth()->user();

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
    <h1>Acceder aux pages</h1>

    <?php if(isset($_GET['login'])): ?>
        <div class="alert alert-success">
            vous etes bien identifier
        </div>
    <?php endif; ?>

    <?php  if ($auth): ?>
        Vous êtes connecté en tant que <?= $auth->username?> - <a href="logout.php" style="text-decoration: none;">Se decconecter</a>
    <?php endif; ?>

    <ul>
        <li><a href="admin.php" style="text-decoration: none;">Page réservée à l'administrateur</a></li>
        <li><a href="user.php" style="text-decoration: none;">Page réservée à l'utilisateur</a></li>
    </ul>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['ID']?></td>
                    <td><?= $user['username']?></td>
                    <td><?= $user['role']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>