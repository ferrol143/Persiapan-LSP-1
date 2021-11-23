<?php

session_start();

     if(isset($_SESSION['login'])){
        header("Location:index.php");
        exit;
    }


    require 'functions.php';
    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");

        //CEK USERNAME
        if( mysqli_num_rows($result) == 1){
            
            //CEK PASSWORD
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row['password'])){

                //set session
              
                $_SESSION['login'] = true;

                header("Location:index.php");
                exit;
            }
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
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class = "container">
    <h1> LOGIN PAGE </h1>

    <?php if(isset($error)) : ?>
        <p style = "color:red;font-style:italic;"> Username / Password salah! Coba lagi! </p>
    <?php endif; ?>

    <form method = "post" action ="">
    <table cellpadding = "10">
        <tr>
            <td> 
                <label> username : </label>
            </td>
            <td>:</td>    
            <td>
                <input type = "text" name = "username">
            </td>
        </tr>    

        <tr>
            <td> 
                <label> password : </label>
            </td>   
            <td>:</td>
            <td>
                <input type = "password" name = "password">
            </td>
        </tr>    
            <td> 
                <button name = "submit" type = "submit"> Masuk </button>
            </td>
        </tr>
    </table>
</form>
    <a href = "register.php" style = ""> Register </a>
     
    </div>
</body>
</html>