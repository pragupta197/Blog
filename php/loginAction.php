<?php

    include_once 'connect.php';
    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        $loginSql = "SELECT * FROM users WHERE uEmail = '$username' AND uPwd = '$pwd'";
        $result = mysqli_query($db, $loginSql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            session_start();
            $_SESSION['user_id'] = $row['uEmail'];
            header('location:../index.php');

        }

        else{

            $message = 'Wrong id or Password';
            echo "<script type='text/javascript'>alert('$message');window.location.href = '../userlogin.html';</script>";

     }
        }
?>
