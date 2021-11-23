<?php
    require 'functions.php';

    $id = $_GET['id'];

    $users = read("SELECT * FROM tb_users WHERE id = $id")[0];

    if(isset($_POST['submit'])){
        if(update($_POST) > 0 ){
              echo "
              
                    <script>

                        alert('Data berhasil di update !!!');
                        document.location.href = 'index.php';

                    </script>
              
              ";
        }else{
            echo " 
                <script>
                    alert('Data berhasil di gagal diupdate !!!');
                </script>
                
                ";  
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE ACCOUNT PAGE</title>
</head>
<body>
    <h1> UPDATE USER ACCOUNT</h1>

    <form method = "post" action ="">
        <input name = "id" value = "<?= $users['id'] ?>" type = "hidden">
    <table cellpadding = "10">
        <tr>
            <td> 
                <label> Nama  </label>
            </td> 
            <td> : </td>   
            <td>
                <input type = "text" name = "nama" value = "<?= $users['nama'] ?>">
            </td>
        <tr>    
            <td> 
                <label> Email  </label>
            </td>
            <td> : </td>  
            <td>  
                <input type = "text" name = "email" value = "<?= $users['email'] ?>">
            </td>
        </tr>     
          
        <tr>
            <td> 
                <label> username : </label>
            </td>
            <td>:</td>    
            <td>
                <input type = "text" name = "username" value = "<?= $users['username'] ?>">
            </td>
        </tr>    

        <tr>
            <td> 
                <label> password : </label>
            </td>   
            <td>:</td>
            <td>
                <input type = "password" name = "password" value = "<?= $users['password'] ?>">
            </td>
        </tr>    
            <td> 
                <button name = "submit" type = "submit"> Ubah </button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>