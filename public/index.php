
<?php
$pdo = new PDO("mysql:host=localhost:3306;dbname=user_db;charset=utf8","root","", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$users = $pdo->query("SELECT * FROM users")->fetchAll();

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

    <ul>
        <li><a href="admin.php">Page réservée à l'administrateur</a></li>
        <li><a href="user.php">Page réservée à l'utilisateur</a></li>
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