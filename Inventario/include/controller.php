<?php
session_start();
require 'connection.php';
date_default_timezone_set("Asia/Manila");
$date = date("Y-m-d");
$date_time = date("Y-m-d h:i:sa");

$usernameErr = $passwordErr = $current_passwordErr = $new_passwordErr = $repeat_passwordErr = $edit_item_idErr = $item_nameErr = $item_categoryErr = $item_descriptionErr = $item_critical_lvlErr = $quantityErr = $uomErr = $received_by = "";
$username = $session_username = $txtpassword  = $current_password  = $new_password  = $repeat_password  = $edit_item_id  = $item_name  = $item_category  = $item_description  = $item_critical_lvl  = $quantity = $received_by = $remarks = "";

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = clean($_POST["username"]);
    }

    if (empty($_POST["txtpassword"])) {
        $passwordErr = "password is required";
    } else {
        $txtpassword = clean($_POST["txtpassword"]);
    }

    if (empty($_POST["current_password"])) {
        $current_passwordErr = "Current password is required";
    } else {
        $current_password = clean($_POST["current_password"]);
    }

    if (empty($_POST["new_password"])) {
        $new_passwordErr = "New password is required";
    } else {
        $new_password = clean($_POST["new_password"]);
    }

    if (empty($_POST["repeat_password"])) {
        $repeat_passwordErr = "password is required";
    } else {
        $repeat_password = clean($_POST["repeat_password"]);
    }
}
//Login Query
if(isset($_POST['login'])){
    $sql = "SELECT * FROM perfil WHERE email='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row['password'] == $txtpassword){
                $_SESSION['user_name'] = $row['email'];
                $passwordErr = '<div class="alert alert-warning">
                        <strong>Login!</strong>se encontro.
                        </div>';
                $username = $row['email'];
                $_SESSION['role'] = $row['role'];
                header("Inventario/login.php");
            } else {
                $passwordErr = '<div class="alert alert-warning">
                        <strong>Login!</strong> Fallido.
                        </div>';
                $username = $row['email'];
            }
        }
    } else {
        $usernameErr = '<div class="alert alert-danger">
  <strong>Usuario </strong>no encontrado.
</div>';
        $username = "";
    }
}

?>
