<?php
session_start();
$user = $_SESSION['user_id'];
include_once 'connect.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>user home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>

            .body-cont{
                margin-right : 30px;
                margin-left : 30px;
                margin-top: 30px;
            }
            /* Remove the navbar's default margin-bottom and rounded borders */
            .navbar {
                margin-bottom: 0;
                margin-bottom: 30px;
                border-radius: 0;
            }

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 450px}

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height:auto;}
                body{
                    max-width : 700px;
                }
            }
        </style>
    </head>
    <body>
        <div class="my-nav"></div>
        <script>
            $(function(){
                $(".my-nav").load("nav.php");
            });
        </script>

        <form class="well form-horizontal" action="editBlog.php" method="post" enctype="multipart/form-data" style="margin : 30px;">
                <input name="useremail" type="text" value="<?php echo $user ?>" style="display: none">
                <fieldset>
                    <legend>
                        <center>
                            <h2>
                                <b>PREVIOUS BLOGS</b>
                            </h2>
                        </center>
                    </legend>
                    <br>
                    <?php
                    $query = "SELECT * FROM `blog` WHERE `uEmail`='$user'";
                    $result = mysqli_query($db, $query);
                    if(mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<h3><input name='bTitle' value=".$row['bTitle']." style= 'border: 0px none; margin-left: 30px;' readonly /></h3>
                        <input name='bText' value=".$row['bText']." style= 'margin-left: 30px;' readonly /><br><br>
                        <img width=300px height= 300px src=data:image;base64,".$row['bImage']." style='margin-top=10px'>
                        <br><br><input name='count' value=".$row['count']." style='display: none;' readonly />
                        <input class='btn' type='submit' name='edit' value='EDIT'/> __________________________________________________________________________________________________________________________________________________________________<br>";
                    }

                    }
                    ?>

        </form>
