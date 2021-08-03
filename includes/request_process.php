<?php

if(!defined('DVD_PATH'))
{
    die(header("HTTP/1.1 403 Forbidden"));
}
else
{
    if(isset(_DATA_['act']))
    {
        $name = $factor->_SQLI(_DATA_['name'],$dbs);
        $mvname = $factor->_SQLI(_DATA_['mvname'],$dbs);
        $email = $factor->_SQLI(_DATA_['email'],$dbs);
        if(!isset(_FILE_['image']['name']) || _FILE_['image']['name']=='')
        {
            $cmdR = "INSERT INTO request_movie(name,movie,email) VALUES('$name','$mvname','$email')";
            $queryR = $dbs->query($cmdR) or die($dbs->error);
        }
        else
        {
            $ext = pathinfo(_FILE_['image']['name'],PATHINFO_EXTENSION);
            if(in_array($ext,MIMETYPE))
            {
                $cmdR = "INSERT INTO request_movie(name,movie,email) VALUES('$name','$mvname','$email')";
                $queryR = $dbs->query($cmdR) or die($dbs->error);
                $file_path = "system_office/uploads/".$name."_".$mvname.".$ext";
                @move_uploaded_file(_FILE_['image']['tmp_name'],$file_path);
                echo "<script>alert('Request submitted!')</script>";
            }
            else
            {
                echo "<script>alert('Wrong Extension!');</script>";
            }
        }
    }
}
?>