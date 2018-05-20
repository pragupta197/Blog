<?php

session_start();
if(!isset($_SESSION['user_id'])){
    echo "<SCRIPT type='text/javascript'> //not showing me this
    alert('plz login');
    window.location.replace('../userlogin.html');
    </SCRIPT>";
}



?>

<nav class='navbar navbar-inverse right'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='#'>PERSONAL BLOG</a>
        </div>
        <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
                <li><a href='index.php'>Add New Blog</a></li>
                <li><a href='php/previousBlog.php'>View Previous Blogs</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>

                <li class = 'btn-danger'><a href='../blog/php/logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
