<?php
include_once 'connect.php';
if(isset($_POST['post']))
{
$useremail= $_POST['useremail'];
$bTitle= $_POST['bTitle'];
$bText = $_POST['bText'];
    $count= $_POST['count'];
if(getimagesize($_FILES['bimage']['tmp_name'])== FALSE){
echo "NOT IMAGE FILE";
    $query = "SELECT * FROM `blog` WHERE  `uEmail`='$useremail' and `count`='$count'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['bImage'];
    }
    $bimage=$image;
}else{
$bimage= addslashes($_FILES['bimage']['tmp_name']);
$bimage= file_get_contents($bimage);
$bimage= base64_encode($bimage);
}

$update= "UPDATE `blog` SET `bTitle`='$bTitle', `bText`='$bText', `bImage`='$bimage' WHERE `uEmail`='$useremail' and `count`='$count'";
//echo $insert;

$result = mysqli_query($db, $update);
if($result){
session_start();
$_SESSION['user_id'] =$useremail ;
header('location:../php/previousBlog.php');
}
else{
    echo("Error description: " . mysqli_error($db));
}

}?>
