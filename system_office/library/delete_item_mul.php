<?php
if(!defined('DVD_PATH'))
{
    require_once '../../constant/errors.php';
    die(header(_500_));
}
else
{
    $cols = explode('&',$GLOBALS['idx']);
    $ret = $exec->dataExisten2($dvdSQL,$_SESSION['table'],$_SESSION['column'],$_SESSION['columnx'],$cols[0],$cols[1]);
    $data = $ret->fetch_assoc();
    $redURL = $func->issetReferer();
    if(isset($data[$_SESSION['column']]))
    {
        $exec->deleteDVD2($dvdSQL,$_SESSION['table'],$_SESSION['column'],$_SESSION['columnx'],$cols[0],$cols[1]);
        unset($_SESSION['table']);
        unset($_SESSION['column']);
        unset($_SESSION['columnx']);
        echo "<script>alert('Data not exist!');window.location.replace('".$redURL."')</script>";
    }
    else
    {
        unset($_SESSION['table']);
        unset($_SESSION['column']);
        echo "<script>alert('Data not exist!');window.location.replace('".$redURL."')</script>";
    }


}
?>