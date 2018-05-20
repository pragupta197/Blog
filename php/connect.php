<?php
$db = mysqli_connect('localhost','root','','blog');
if(!$db){
    $message = 'DB error';
    echo "<script type='text/javascript'>alert('$message');window.location.href = '../userlogin.html';</script>";
}

?>
