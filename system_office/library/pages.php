            <table>
            <th>Matrix ID</th><th>Name</th><th>Position</th><th>Email</th><th>Image</th><th>Action</th>
<?php

switch($action[4])
{
    case 'about':
        $about = $exec->about_us($dvdSQL);
        while($abrow=$about->fetch_assoc())
        {
           echo "<tr><td>".$abrow['matrix']."</td><td>".$abrow['name']."</td><td>".$abrow['position'].
           "</td><td>".$abrow['email']."</td><td><img src=".PRFIMG.$abrow['matrix'].
           " width='100' height='100'></td><td><a href='"._ABOUTD_.$abrow['matrix']."'>Delete</a> / <a href='"._ABOUTU_.$abrow['matrix']."'>Edit</a></td></tr>";
        }
        if(isset($action[5]))
        {
            if(strpos($action[5],"?id="))
            {
                $proc = explode("?id=",$action[5]);
                switch($proc[0])
                {
                    case "delete":
                        $id = $factor->_SQLI($proc[1],$dvdSQL);
                        $cmdA = "DELETE FROM about_us WHERE matrix='$id'";
                        $queryA = $dvdSQL->query($cmdA) or die($dvdSQL->error);
                        echo "<script>alert('Successfully deleted!');window.history.back();</script>";
                    break;
                    case "update":
                        $id = $factor->_SQLI($proc[1],$dvdSQL);
                        $cmdA = "SELECT * FROM about_us WHERE matrix='$id'";
                        $queryA = $dvdSQL->query($cmdA) or die($dvdSQL->error);
                        $rowA = $queryA->fetch_assoc();
                        if(isset($rowA['matrix']) && $rowA['matrix']!="")
                        {
                            if(!isset(_DATA_['acts']))
                            {
                            ?>
                        <div class="updateAbout" style="text-align:center;color:#fff;">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <table>
                        <tr><td><label>Name</lable></td><td><input type="text" name="name" value="<?php echo $rowA['name']; ?>"></td></tr>
                        <tr><td><label>Position</lable></td><td><input type="text" name="position" value="<?php echo $rowA['position']; ?>"></td></tr>
                        <tr><td><label>Email</lable></td><td><input type="text" name="email" value="<?php echo $rowA['email']; ?>"></td></tr>
                        <tr><td><label>Image</lable></td><td><input type="file" name="image"></td></tr>
                        <tr><td></td><td><input type="submit" name="acts"></td></tr>
                        </form></div></table>
                            <?php
                            }
                            else
                            {
                                $name = $factor->_XSS($factor->_SQLI(_DATA_['name'],$dvdSQL),4,NULL);
                                $position = $factor->_XSS($factor->_SQLI(_DATA_['position'],$dvdSQL),4,NULL);
                                $email = $factor->_XSS($factor->_SQLI(_DATA_['email'],$dvdSQL),4,NULL);
                                $image = $factor->_XSS($factor->_SQLI(_FILE_['image']['name'],$dvdSQL),4,NULL);
                                $ext = pathinfo(_FILE_['image']['name'],PATHINFO_EXTENSION);
                                if(in_array($ext,MIMETYPE))
                                {
                                    @move_uploaded_file(_FILE_['image']['tmp_name'],"profile/"._FILE_['image']['name']);
                                    $cmdB = "UPDATE about_us SET name='$name',position='$position',email='$email',image='$image' WHERE matrix='$id'";
                                    $queryB = $dvdSQL->query($cmdB) or die($dvdSQL->error);
                                    echo "<script>window.location.replace('"._URL_."system_office/page/about');</script>";
                                }
                                else
                                {
                                    $cmdC = "SELECT image FROM about_us WHERE matrix='$id'";
                                    $queryC = $dvdSQL->query($cmdC) or die($dvdSQL->error);
                                    $rowC = $queryC->fetch_assoc();
                                    $image = $rowC['image'];
                                    $cmdB = "UPDATE about_us SET name='$name',position='$position',email='$email',image='default.jpg' WHERE matrix='$id'";
                                    $queryB = $dvdSQL->query($cmdB) or die($dvdSQL->error);
                                    echo "<script>window.location.replace('"._URL_."system_office/page/about');</script>";
                                }

                            }
                        }
                    break;
                }
            }
        }
    break;
    case 'contact':
       
    break;
}
?>
            
            </table>