<?php
require 'interfaces.php';
class dvd_collections implements allFunctions
{
    private $loggedIn;
    private $username;
    private $password;
    private $random_token;
    private $upload_permission;
    private $item_array;
    public function administrator($sql,$user,$pass)
    {
        $this->username = $sql->real_escape_string($user);
        $this->password = $sql->real_escape_string($pass);
        $cmd = "SELECT * FROM users WHERE username='{$this->username}' AND password='{$this->password}'";
        $fetch = $sql->query($cmd) or die($sql->error);
        $current = $fetch->fetch_assoc();
        if(isset($current['id']) && isset($current['name']))
        {
            $this->loggedIn = true;
            return $this->loggedIn;
        }
        else
        {
            $this->loggedIn = false;
            return $this->loggedIn;
        }
    }
    public function user_logout()
    {
        unset($_SESSION['loggedIn']);
        unset($_SESSION['user_role']);
        unset($_SESSION['SESSION_START']);
        unset($_SESSION['XSRF']);
        unset($_SESSION['table']);
        unset($_SESSION['column']);
        unset($_SESSION['columnx']);
        setrawcookie('SESSION_START',null);
        setrawcookie('SESSION_ID',null);
        setrawcookie('PHPSESSID',null);
        setrawcookie('XSRF',null);
        session_destroy();
        header('Location:/dvd/system_office/');
    }
    public function generate_token($string,$length)
    {
        $string_len = strlen($string);
        for($i=0;$i<$length;$i++)
        {
            $getString = $string[mt_rand(0,($string_len-1))];
            $this->random_token .= $getString;
        }
        return $this->random_token;
    }
    public function session_validation()
    {
        if($_COOKIE['SESSION_START']!=$_SESSION['SESSION_START'])
        {
            return $this->user_logout();
        }
    }
    public function issetReferer()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            return $_SERVER['HTTP_REFERER'];
        }
        else
        {
            return MainPage;
        }
    }
    public function issetTableColumn()
    {
        if((!isset($_SESSION['table'])) || (!isset($_SESSION['column'])))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    public function TableColumnArray($no)
    {
        switch($no)
        {
            case 1:
                $this->item_array = array(TABLE1,TABLE2,TABLE3);
                return $this->item_array;
            break;
            case 2:
                $this->item_array = array(COLUMN1,COLUMN2);
                return $this->item_array;
            break;
        }
    }
    public function insertForm($lvl)
    {
        switch($lvl)
        {
            case 1:
                ?>
                    <form action='' method='POST' enctype='multipart/form-data' autocomplete='off'>
                    <table>
                    <tr><td>ASIN : </td><td><input type='text' name='asin' placeholder='ASIN ID'/></td></tr>
                    <tr><td>Name : </td><td><input type='text' name='name' placeholder='DVD Name'/></td></tr>
                    <tr><td>Price: </td><td><input type='text' name='price' placeholder='$0.00'/></td></tr>
                    <tr><td></td><td>Tick here for download from url: <input type='checkbox' onchange='changeForm(this);'/></td></tr>
                    <tr><td>Image: </td><td><span id='uploader'><input type='file' name='image' /></span></td></tr>
                    <tr><td></td><td><input type='submit' name='insert' value='Add'></td></tr>
                    </table></form>
                <?php
            break;
            case 2:
                ?>
                    <form action='' method='POST' enctype='multipart/form-data' autocomplete='off'>
                    <table>
                    <tr><td>First Name : </td><td><input type='text' name='fname' placeholder='First Name'/></td></tr>
                    <tr><td>Last Name : </td><td><input type='text' name='lname' placeholder='Last Name'/></td></tr>
                    <tr><td></td><td><input type='submit' name='insert' value='Add'></td></tr>
                    </table></form>
                <?php
            break;
            case 3:
                ?>
                    <form action='' method='POST' enctype='multipart/form-data' autocomplete='off'>
                    <table>
                    <tr><td>ASIN : </td><td><input type='text' name='asin' placeholder='ASIN ID'/></td></tr>
                    <tr><td>Actor ID : </td><td><input type='number' name='actorID' placeholder='Actor ID'/></td></tr>
                    <tr><td></td><td><input type='submit' name='insert' value='Add'></td></tr>
                    </table></form>
                <?php
            break;
        }
    }
    public function editForm($lvl,$encoded_column)
    {
        $column = explode('@',$encoded_column);
        switch($lvl)
        {
            case 1:
                ?>
                    <form action='' method='POST' enctype='multipart/form-data' autocomplete='off'>
                    <table>
                    <tr><td></td><td><img src='<?php echo IMGDISP.base64_decode($column[0]); ?>' width='100' height='100'/></td></tr>
                    <tr><td>ASIN : </td><td><input type='text' name='asin' value='<?php echo base64_decode($column[0]); ?>'/></td></tr>
                    <tr><td>Name : </td><td><input type='text' name='name' value='<?php echo base64_decode($column[1]); ?>'/></td></tr>
                    <tr><td>Price: </td><td><input type='text' name='price' value='<?php echo base64_decode($column[2]); ?>'/></td></tr>
                    <tr><td></td><td>Tick here for download from url: <input type='checkbox' onchange='changeForm(this);'/></td></tr>
                    <tr><td>Image: </td><td><span id='uploader'><input type='file' name='image' /></span></td></tr>
                    <tr><td></td><td><input type='submit' name='update' value='Update'></td></tr>
                    </table></form>
                <?php
            break;
            case 2:
                ?>
                    <form action='' method='POST' enctype='multipart/form-data' autocomplete='off'>
                    <table>
                    <tr><td>First Name : </td><td><input type='text' name='fname' value='<?php echo base64_decode($column[0]); ?>'/></td></tr>
                    <tr><td>Last Name : </td><td><input type='text' name='lname' value='<?php echo base64_decode($column[1]); ?>'/></td></tr>
                    <tr><td></td><td><input type='submit' name='update' value='Update'></td></tr>
                    </table></form>
                <?php
            break;
            case 3:
                ?>
                   <form action='' method='POST' enctype='multipart/form-data' autocomplete='off'>
                    <table>
                    <tr><td>ASIN : </td><td><input type='text' name='asin' value='<?php echo base64_decode($column[0]); ?>'/></td></tr>
                    <tr><td>Actor ID : </td><td><input type='number' name='actorID' value='<?php echo base64_decode($column[1]); ?>'/></td></tr>
                    <tr><td></td><td><input type='submit' name='update' value='Update'></td></tr>
                    </table></form>
                <?php
            break;
        }
    }
    public function thumbImage($link)
    {
        $allowed = array("jpg","jpeg","png","bmp","gif");
        $getExt = explode(".",basename($link));
        if(!(preg_match("/http/i",$link)))
        {
            $link .= "http://".$link;
            $getExt = explode(".",basename($link));
        }
        $extension = end($getExt);
        if(in_array($extension,$allowed))
        {
            $content = file_get_contents($link);
            return base64_encode($content);
        }
        else
        {
            $content = "Only image extension can be process";
            return base64_encode($content);
        }
        
    }
    public function saveFile($content,$ext,$id)
    {
        $location = "../files/";
        $rand = mt_rand(10000,99999);
        $filename = $location.$id."-".$rand.".".$ext;
        $file = fopen($filename,"w");
        fwrite($file,base64_decode($content));
        fclose($file);
        return $filename;
    }
    public function mailing($json)
    {
        ini_set('smtp_port',587);
        ini_set("SMTP","smtp.gmail.com");
        $data=json_decode($json);

        $subject = $data->Subject;
        $message = "Name : $data->Name Email : $data->Email\r\nPhone : $data->Phone\r\nMessage : ".$data->message;

        $headers = "From: $data->Name($data->Email)\r\n";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        if(mail('umcaleader@gmail.com',$subject,$message,$headers))
        {
            echo "<div id='results_'>";
            echo "<h3>Mail successfully send!</h3>";
            echo "<table><tr><td>Your Name</td><td> : </td><td>$data->Name<td></td>";
            echo "<tr><td>Your Email</td><td> : </td><td>$data->Email<td></td>";
            echo "<tr><td>Your Subject</td><td> : </td><td>$data->Subject<td></td>";
            echo "<tr><td>Your Message</td><td> : </td><td><textarea disabled>$data->message</textarea><td></td>";
            echo "</table></div>";
        }
        else
        {
            echo "<div class='contact-form'>Unsuccessfully send email!</div>";
        }
    }

}