<?php
if(!defined('DVD_PATH'))
{
    require_once '../../constant/errors.php';
    die(header(_500_));
}
else //if(isset($GLOBALS['idx']))
{
    $ret = $exec->dataExisten($dvdSQL,$_SESSION['table'],$_SESSION['column'],$GLOBALS['idx']);
    $data = $ret->fetch_assoc();
    $redURL = $func->issetReferer();
    if(isset($data[$_SESSION['column']]))
    {
        $exec->deleteDVD($dvdSQL,$_SESSION['table'],$_SESSION['column'],$GLOBALS['idx']);
        unset($_SESSION['table']);
        unset($_SESSION['column']);
        echo "<script>alert('Deleted!');window.location.replace('".$redURL."')</script>";
    }
    else
    {
        unset($_SESSION['table']);
        unset($_SESSION['column']);
        echo "<script>alert('Data not exist!');window.location.replace('".$redURL."')</script>";
    }
}
?>