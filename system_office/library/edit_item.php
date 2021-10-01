<?php
if(!defined('DVD_PATH'))
{
    require_once '../../constant/errors.php';
    die(header(_500_));
}
else
{
    if($action[4]=='' || $action[5]=='')
    {
        header('Location:'.ADMIN_PATH);
    }
    else
    {
        if(isset($action[6])) $idx2 = $factor->_SQLI(urldecode($action[6]),$dvdSQL);
        $idx = $factor->_SQLI(urldecode($action[4]),$dvdSQL);
        switch($action[5])
        {
            case 1:
                $cmd = "SELECT * FROM ".TABLE1." WHERE ".COLUMN1."='$idx'";
                $query = $dvdSQL->query($cmd) or die($dvdSQL->error);
                $row = $query->fetch_assoc();
                if(!isset(_DATA_['update']))
                {
                    $encoded_column = base64_encode($row['ASIN'])."@".base64_encode($row['Title']).
                    "@".base64_encode($row['Price'])."@".base64_encode($row['Image']);
                    $func->editForm($action[5],$encoded_column);
                }
                else
                {
                    if(!isset(_DATA_['link_image']))
                    {
                        $filename = basename(_FILE_['image']['name']);
                        $tmp_file = _FILE_['image']['tmp_name'];
                        $file_type = _FILE_['image']['type'];
                        if($factor->mime_scan($filename,$file_type))
                        {
                            unlink(UPLOADED_LOCATION.$row['Image']);
                            @move_uploaded_file($tmp_file,UPLOADED_LOCATION.$filename);
                            $encoded_data = base64_encode(_DATA_['asin']."||"._DATA_['name']."||"._DATA_['price']."||".$filename);
                            $encoded_column = base64_encode("ASIN||Title||Price||Image");
                            $exec->editDVD($dvdSQL,TABLE1,COLUMN1,$encoded_column,$idx,$encoded_data,$action[5]);
                            echo "<script>alert('Successfully updated!');window.location.replace(view1);</script>";
                        }
                        else
                        {
                            echo "<script>alert('File cannot be uploaded!!');window.location.replace(window.location.href);</script>";
                        }
                    }
                    else
                    {
                        $contents = $func->thumbImage(_DATA_['link_image']);
                        $linkExt = pathinfo(basename(_DATA_['link_image']));
                        if($factor->checkExtension($linkExt['extension']))
                        {
                            unlink(UPLOADED_LOCATION.$row['Image']);
                            $filename = $func->saveFile($contents,$linkExt['extension'],_DATA_['asin']);
                            $encoded_data = base64_encode(_DATA_['asin']."||"._DATA_['name']."||"._DATA_['price']."||".$filename);
                            $encoded_column = base64_encode("ASIN||Title||Price||Image");
                            $exec->editDVD($dvdSQL,TABLE1,COLUMN1,$encoded_column,$idx,$encoded_data,$action[5]);
                            echo "<script>alert('Successfully updated!');window.location.replace(view1);</script>";
                        }
                        else
                        {
                            echo "<script>alert('File cannot be uploaded!!');window.location.replace(window.location.href);</script>";
                        }             
                    }

                }
            break;
            case 2:
                if(!isset(_DATA_['update']))
                {
                    $cmd = "SELECT * FROM ".TABLE2." WHERE ".COLUMN2."='$idx'";
                    $query = $dvdSQL->query($cmd) or die($dvdSQL->error);
                    $row = $query->fetch_assoc();
                    $encoded_column = base64_encode($row['lname'])."@".base64_encode($row['fname']).
                    "@".base64_encode($row['lname']);
                    $func->editForm($action[5],$encoded_column);
                }
                else
                {
                    $encoded_data = base64_encode(_DATA_['fname']."||"._DATA_['lname']);
                    $encoded_column = base64_encode("fname||lname");
                    $exec->editDVD($dvdSQL,TABLE2,COLUMN2,$encoded_column,$idx,$encoded_data,$action[5]);
                    echo "<script>alert('Successfully updated!');window.location.replace(view2);</script>";
                }
            break;
            case 3:
                if(!isset(_DATA_['update']))
                {
                    $cmd = "SELECT * FROM ".TABLE3." WHERE ".COLUMN1."='$idx' AND ".COLUMN2."='$idx2'";
                    $query = $dvdSQL->query($cmd) or die($dvdSQL->error);
                    $row = $query->fetch_assoc();
                    $encoded_column = base64_encode($row['ASIN'])."@".base64_encode($row['actorID']);
                    $func->editForm($action[5],$encoded_column);
                }
                else
                {
                    $cmd = "SELECT actorID FROM ".TABLE3." WHERE ".COLUMN1."='$idx' AND ".COLUMN2."='$idx2'";
                    $query = $dvdSQL->query($cmd) or die($dvdSQL->error);
                    $row = $query->fetch_assoc();
                    $encoded_data = base64_encode(_DATA_['asin']."||"._DATA_['actorID']);
                    $encoded_column = base64_encode("ASIN||actorID");
                    $exec->editDVD($dvdSQL,TABLE3,$row['actorID'],$encoded_column,$idx,$encoded_data,$action[5]);
                    echo "<script>alert('Successfully updated!');window.location.replace(view3);</script>";
                }
            break;
        }
    }
}
?>