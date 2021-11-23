<?php
    require 'functions.php';

    if(isset($_POST['submit'])){
        if(addUser($_POST) > 0 ){
              echo "
              
                    <script>

                        alert('Data berhasil di tambahkan !!!');
                        document.location.href = 'index.php';

                    </script>
              
              ";
        }else{
            echo " 
                <script>
                    alert('Data berhasil di gagal ditambahkan !!!');
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
    <title>REGISTER ACCOUNT PAGE</title>
</head>
<body>
    <h1> REGISTER ACCOUNT</h1>

    <form method = "post" action ="">
    <table cellpadding = "10">
        <tr>
            <td> 
                <label> Nama  </label>
            </td> 
            <td> : </td>   
            <td>
                <input type = "text" name = "nama">
            </td>
        <tr>    
            <td> 
                <label> Email  </label>
            </td>
            <td> : </td>  
            <td>  
                <input type = "text" name = "email">
            </td>
        </tr>     
          
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
                <button name = "submit" type = "submit"> Kirim </button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>