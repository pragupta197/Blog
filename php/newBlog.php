<?php
include_once 'connect.php';

if(isset($_POST['post']))
{
    $useremail= $_POST['useremail'];
    $bTitle= $_POST['bTitle'];
    $bText = $_POST['bText'];
    if(getimagesize($_FILES['bimage']['tmp_name'])== FALSE){
            echo "NOT IMAGE FILE";
    }
    else{
        $image= addslashes($_FILES['bimage']['tmp_name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);
    }
        $query="SELECT MAX(count) AS count FROM `blog` where `uEmail`='$useremail'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
    $count = $row['count'];
                $count++;
                
    }else{
                $count=1;
            }

    
    $insertUserSql= "INSERT INTO `blog`(`uEmail`, `bTitle`, `bText`, `bImage`,`count`) VALUES
        ('$useremail','$bTitle','$bText','$image','$count')";
    $result = mysqli_query($db, $insertUserSql);
    if($result){
        session_start();
        $_SESSION['user_id'] =$useremail ;
        header('location:../index.php');
    }
    else{
         echo("Error description: " . mysqli_error($db));
    }

}

?>
