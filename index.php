<?php
session_start();
$user = $_SESSION['user_id'];
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
    <form class="well form-horizontal" action="php/newBlog.php" method="post" enctype="multipart/form-data">
        <input name="useremail" type="text" value="<?php echo $user ?>" style="display: none">
        <fieldset>
            <legend>
                <center>
                    <h2>
                        <b>ADD NEW BLOG</b>
                    </h2>
                </center>
            </legend>
            <br>
            <div class="form-group">
                <div class="col-md-12 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-globe"></i>
                        </span>
                        <!-- <select class="form-control input-lg js-example-basic-single" id="website" onchange="ifrChange();"> -->
                        <textarea placeholder="Blog Title" class="form-control" type="text" name="bTitle" required minlength="1"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-comment"></i>
                        </span>
                        <textarea placeholder="Text" class="form-control input-lg" type="text" id="cmt" name="bText" required minlength="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">

                <div class="col-md-12">
                    <div class="input-group">
                    <br>
                  <input type="file" name="bimage" id="bimage" />
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                    <br>
                    <button type="submit" class="btn btn-lg btn-warning btn-block" name="post">Post</button>

                </div>
            </div>

        </fieldset>
    </form>
  
    <script src="jquery.autoresize.min.js"></script>
    <script>
        $('#cmt').autoResize()
    </script>
</body>
</html>
