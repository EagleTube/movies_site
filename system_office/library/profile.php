<?php
require "../../constant/define.php";
require "../../constant/errors.php";
require "../../php/security.php";
require "../../php/config.php";
include("data_sql.php");

if(!isset($_SESSION['loggedIn'])) die(header(_403_));

$connn = new db_connection;
$dataSQL = new sql_functions;
$filter = new Security;

$dbh = $connn->connectDb();

$type = array('jpg'=>'image/jpg','jpeg'=>'image/jpeg','gif'=>'image/gif','png'=>'image/png','svg'=>'image/svg+xml');

if(!isset($_REQUEST['profile']))
{
    echo 'No ID';
}
else
{
    $matrix = $_REQUEST['profile'];
    $getImg = $dataSQL->profileLocation($dbh,$filter->_SQLI($matrix,$dbh));
    $row = $getImg->fetch_assoc();
    $image = _PROFILE_."default.jpg";
    if(!empty($row['Image']))
    {
        $image = _PROFILE_ . $row['Image'];
        $info = pathinfo($image);
        $dataSQL->imagePreview($type[$info['extension']],$image);
    }
    else
    {
        $dataSQL->imagePreview($type['jpg'],$image);
    }

}