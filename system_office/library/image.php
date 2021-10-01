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

if(!isset($_REQUEST['asin']))
{
    echo 1;
}
else
{
    $asin = $_REQUEST['asin'];
    $getImg = $dataSQL->imageLocation($dbh,$filter->_SQLI($asin,$dbh));
    $row = $getImg->fetch_assoc();
    $image = FILE_LOC."default.jpg";
    if(!empty($row['Image']))
    {
        $image = FILE_LOC . $row['Image'];
        $info = pathinfo($image);
        $dataSQL->imagePreview($type[$info['extension']],$image);
    }
    else
    {
        $dataSQL->imagePreview($type['jpg'],$image);
    }

}