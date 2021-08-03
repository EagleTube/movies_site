<?php
if(!defined('DVD_PATH'))
{
    require_once '../../constant/errors.php';
    die(header(_500_));
}
else
{
    $table_list = $func->TableColumnArray(1);
    $column_list = $func->TableColumnArray(2);
    if(!isset($GLOBALS['idx']))
    {
        header('Location:'.ADMIN_PATH);
    }
    else
    {
        $category = explode('&category=',$GLOBALS['idx']);
        $mid = explode('&mid=',$category[1]);
        switch($category[0])
        {
            case 'insert':
                if(in_array($mid[0],$table_list))
                {
                    if(isset(_DATA_['insert']))
                    {
                            switch($mid[1])
                            {
                                case 1:
                                    if(!isset(_DATA_['link_image']))
                                    {
                                        $filename = basename(_FILE_['image']['name']);
                                        $tmp_file = _FILE_['image']['tmp_name'];
                                        $file_type = _FILE_['image']['type'];
                                        if($factor->mime_scan($filename,$file_type))
                                        {
                                            @move_uploaded_file($tmp_file,UPLOADED_LOCATION.$filename);
                                            $val1 = base64_encode(_DATA_['asin']) . "||" . base64_encode(_DATA_['name']) . "||" .
                                            base64_encode(_DATA_['price']) . "||" . base64_encode($filename);
                                            $exec->addDVD($dvdSQL,$mid[0],$val1,$mid[1]);
                                            echo "<script>alert('Succesfully added!');window.location.replace(window.location.href);</script>";
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
                                            $filename = $func->saveFile($contents,$linkExt['extension'],_DATA_['asin']);
                                            $val1 = base64_encode(_DATA_['asin']) . "||" . base64_encode(_DATA_['name']) . "||" .
                                            base64_encode(_DATA_['price']) . "||" . base64_encode($filename);
                                            $exec->addDVD($dvdSQL,$mid[0],$val1,$mid[1]);
                                            echo "<script>alert('Succesfully added!');window.location.replace(window.location.href);</script>";
                                        }
                                        else
                                        {
                                            echo "<script>alert('File cannot be uploaded!!');window.location.replace(window.location.href);</script>";
                                        }
                                    }
                                break;
                                case 2:
                                    $genID = mt_rand(0,999);
                                    $val1 = base64_encode($genID) . "||" . base64_encode(_DATA_['fname']) . 
                                    "||" . base64_encode(_DATA_['lname']);
                                    $exec->addDVD($dvdSQL,$mid[0],$val1,$mid[1]);
                                    echo "<script>alert('Succesfully added!');window.location.replace(window.location.href);</script>";
                                break;
                                case 3:
                                    $val1 = base64_encode(_DATA_['asin']) . "||" . base64_encode(_DATA_['actorID']);
                                    $exec->addDVD($dvdSQL,$mid[0],$val1,$mid[1]);
                                    echo "<script>alert('Succesfully added!');window.location.replace(window.location.href);</script>";
                                break;
                            }
                    }
                    else
                    {
                        $func->insertForm($mid[1]);
                    }
                }
            break;
            case 'publish';
                if($mid[0]=='movies')
                {
                    if(!isset(_DATA_['publish']))
                    {
                        ?>
                        <table>
                        <form action="" method="POST">
                        <tr><td>Youtube Trailer ID</td><td><input type='text' name='yid' placeholder='youtube id'></td></tr>
                        <tr><td>Assigned ASIN</td><td><select name='asin' id='asin'>
                        <?php
                        $cmdP = "SELECT ASIN FROM dvdtitles";
                        $queryP = $dvdSQL->query($cmdP) or die($dvdSQL->error);
                        echo "<option value=''>Choose ASIN</option>";
                        while($row=$queryP->fetch_assoc())
                        {
                            echo "<option value='".$row['ASIN']."'>".$row['ASIN']."</option>";
                        }
                        ?>
                        </select></td></tr>
                        <tr><td></td><td><input type='submit' name='publish' value='Publish'></td></tr>
                        </form>
                        </table>
                        <?php
                    }
                    else
                    {
                        $yid = $factor->_SQLI(_DATA_['yid'],$dvdSQL);
                        $asin = $factor->_SQLI(_DATA_['asin'],$dvdSQL);

                        $cmdP1 = "SELECT ASIN FROM dvdtitles WHERE ASIN='$asin'";
                        $queryP1 = $dvdSQL->query($cmdP1) or die($dvdSQL->error);
                        $rowP = $queryP1->fetch_assoc();
                        if(isset($rowP['ASIN']) && $rowP['ASIN']!='')
                        {
                            $cmdP = "INSERT INTO movie_list VALUES('$yid','$asin')";
                            $queryP = $dvdSQL->query($cmdP) or die($dvdSQL->error);
                            echo "<script>alert('Movie are now published!');window.location.replace(window.location.href);</script>";
                        }
                        else
                        {
                            echo "<script>alert('ASIN ID not in database!');window.location.replace(window.location.href);</script>";
                        }
                    }
                }
                else
                {
                    echo "<script>window.location.replace('"._URL."system_office');</script>";
                }
            break;
        }
    }
}