<?php

    session_start();

    if(!isset($_SESSION['login'])){
        header("Location:login.php");
        exit;
    }

    require 'functions.php';

    $users = read("SELECT * FROM tb_users");   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS PAGE</title>
</head>
<body>
    <div class = "container">
    <h1> Data Users </h1>
    <a href = "logout.php" style = ""> Logout </a>
    <table border = "1" cellpadding = "10" cellspacing = "0" >
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Username</td>
            <td>Password</td>
            <td>Action</td>
        </tr>
        <?php $i = 1; ?>  
        <?php foreach($users as $u) : ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $u['nama'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['username'] ?></td>
            <td><?= $u['password'] ?></td>
            <td>
                <a href = "update.php?id=<?= $u['id'] ?>">Update | </a>
                <a href = "delete.php?id=<?= $u['id'] ?>" onclick = "return confirm('Anda yakin')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    </div>
</body>
</html>