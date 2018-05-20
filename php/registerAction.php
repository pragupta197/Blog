<?php

    include_once 'connect.php';

    if(isset($_POST['register'])){
        $uFname = $_POST['fname'];
        $uLname = $_POST['lname'];
        $email = $_POST['email'];
        $upwd = $_POST['pwd'];

        if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM `users` WHERE uEmail = '$email'"))>0){
            $message = 'User Already Exists';
            echo "<script type='text/javascript'>alert('$message');window.location.href = 'register.html';</script>";
        }
        else{

        $insertUserSql= "INSERT INTO `users`(`uFname`, `uLname`, `uEmail`, `uPwd`) VALUES

        ('$uFname','$uLname','$email','$upwd')";

        $result = mysqli_query($db, $insertUserSql);
         if($result){
            session_start();
             $_SESSION['user_id'] =$email ;
            header('location:../index.php');
            }}
    }

    ?>
