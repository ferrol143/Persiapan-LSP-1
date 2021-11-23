<?php

$conn = mysqli_connect('localhost','root','','db_latihanlsp');


function read($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}


function addUser($data){

    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $username = strtolower(stripslashes(htmlspecialchars($data['username'])));
    $password = mysqli_real_escape_string($conn,htmlspecialchars($data['password']));

    //CEK USERNAME DI DATABASE, JIKA SUDAH TERDAFTAR MAKA ERROR
    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah digunakan');
              </script>";
        return false;
    }

    //ENKRIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tb_users VALUES ('', '$nama', '$email', '$username', '$password')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function update($data){

    global $conn;

    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $username = strtolower(stripslashes(htmlspecialchars($data['username'])));
    $password = mysqli_real_escape_string($conn,htmlspecialchars($data['password']));

    $query = "UPDATE tb_users SET 
            nama = '$nama', 
            email = '$email',
            username = '$username',
            password = '$password'
            
            WHERE id = $id
            ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}


function delete($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_users WHERE id = $id");

    return mysqli_affected_rows($conn);
}

?>
