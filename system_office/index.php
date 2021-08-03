<!DOCTYPE html>
<html>
<head>
<style>
*{
    margin:0;
    padding:0;
}
html{
    box-sizing:border-box;
}
body{
    height:100vh;
}
a{
    text-decoration:none;
}
.Navigation{
    font-size:20px;
    width:150px;
    height:100vh;
    padding:20px;
    float:left;
    background:rgba(255,255,255,0.5);
}
.Navigation a{
  display: block;
  padding:10px;
  text-decoration:none;
  color:#fff;
}
#admin_panel{
    margin-top:-100px;
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(https://getwallpapers.com/wallpaper/full/9/b/e/374783.jpg);
    background-size:cover;
    background-repeat: no-repeat;
    background-attachment:fixed;
    padding-top:100px;
}
#table_display{
    height:100vh;
    overflow:auto;
}
#table_display table{
    padding-top:10px;
    overflow:auto;
    margin:auto;
}
#table_display table th,#table_display table tr,#table_display table td {
    border:1.5px solid #0f0a81;
    text-align:center;
    padding:10px;
}
#table_display table tr,#table_display table td {
    color:#fff;
}
#table_display table td a{
    color:yellow;
}
#table_display table th{
    color:#205efe;
}
#table_display input[type=submit]
{
    width:100%;
    padding:5px;
    cursor:pointer;
}
#dropcontent{
    display:none;
    font-size:18px;
}
#menu{
    background:green;
}
.dropmenu:hover #dropcontent{
    display:block;
}
.footer{
    height:40px;
    background:#000;
}
.footer p{
    text-align:center;
    color:#fff;
}

</style>
</head>
<body>
<?php

//error_reporting(0);

require "../constant/define.php";
require "../php/config.php";
require "../php/functions.php";
require "../php/security.php";

$dvdX = new db_connection;
$func = new dvd_collections;
$factor = new Security;
$dvdSQL = $dvdX->connectDb();

if(!isset($_SESSION['loggedIn']))
{
    include('login.php');
}
else
{
    echo "<section id='admin_panel'>";
    $func->session_validation();
    include('dashboard.php');
    echo "</section>";
}
?>
<section class='footer'>
<p>Admin Panel</p>
</section>
</body>
</html>