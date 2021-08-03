<?php
require "constant/define.php";
require "constant/errors.php";
require "php/security.php";
require "php/config.php";
include("system_office/library/data_sql.php");

$connn = new db_connection;
$dataSQL = new sql_functions;
$filter = new Security;

$dbh = $connn->connectDb();

$type = array('jpg'=>'image/jpg','jpeg'=>'image/jpeg','gif'=>'image/gif','png'=>'image/png','svg'=>'image/svg+xml');

if(!isset($_REQUEST['asin']))
{
    if(isset($_REQUEST['matrix']))
    {
        $matrix = $_REQUEST['matrix'];
        $getImg = $dbh->real_escape_string($matrix);
        $ret = "SELECT image FROM about_us WHERE matrix='$getImg'";
        $query = $dbh->query($ret);
        $row = $query->fetch_assoc();
        $image = "files/default.jpg";
        if(!empty($row['image']))
        {
            $image = "system_office/profile/" . $row['image'];
            $info = pathinfo($image);
            $dataSQL->imagePreview($type[$info['extension']],$image);
        }
        else
        {
            $dataSQL->imagePreview($type['jpg'],$image);
        }
    }
}
else
{
        $asin = $_REQUEST['asin'];
        $getImg = $dataSQL->imageLocation($dbh,$filter->_SQLI($asin,$dbh));
        $row = $getImg->fetch_assoc();
        $image = "files/default.jpg";
        if(!empty($row['Image']))
        {
            $image = "files/" . $row['Image'];
            $info = pathinfo($image);
            $dataSQL->imagePreview($type[$info['extension']],$image);
        }
        else
        {
            $dataSQL->imagePreview($type['jpg'],$image);
        }
}
