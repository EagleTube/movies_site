<?php
class Security{
    private $output;
    private $sql_bool;
    private $referrer=array('localhost','127.0.0.1');
    public function _XSS($input,$level,$function)
    {
        switch($level)
        {
            case 1: //for removing <> tag
                $this->output=strip_tags($input);
                return $this->output;
            break;
            case 2: //for escaping <> char
                if($function==NULL)
                {
                    $this->output .= htmlspecialchars($this->output);
                    return $this->output;
                    break;
                }
                $this->output .= htmlentities($this->output);
                return $this->output;
            break;
            case 3:
                if($function==NULL)
                {
                    $this->output .= htmlspecialchars($this->output,ENT_QUOTES);
                    return $this->output;
                    break;
                }
                $this->output .= htmlentities($this->output,ENT_QUOTES);
                return $this->output;
            break;
            case 4:
                $rmtag=strip_tags($input);
                if($function==NULL)
                {
                    $this->output = htmlspecialchars($rmtag,ENT_QUOTES);
                    return $this->output;
                    break;
                }
                $this->output = htmlentities($rmtag,ENT_QUOTES);
                return $this->output;
            break;
        }
    }
    public function _SQLI($input,$sql)
    {
            if(is_numeric($input))
            {
                $this->sql_bool = $input;
                return $this->sql_bool;
            }
            else
            {
                $rmsq = preg_replace("/'/i","",$input);
                $this->sql_bool = $sql->real_escape_string($rmsq);
                return $this->sql_bool;
            }
    }
    public function HostCheck($host)
    {
        if(in_array($host,$this->referrer))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function mime_scan($BaseName,$FileType)
    {
        $info = pathinfo($BaseName);
        $allowed_ext = array('jpg','gif','png','bmp','webp','jpeg');
        $allowed_type = array('image/jpg','image/gif','image/png','image/bmp','image/webp','image/jpeg');
        if((!in_array($info['extension'],$allowed_ext)) || (!in_array($FileType,$allowed_type)))
        {
            $this->upload_permission = false;
            return $this->upload_permission;
        }
        else
        {
            $this->upload_permission = true;
            return $this->upload_permission;
        }
    }
    public function checkExtension($ext)
    {
        $allowed_ext = array('jpg','gif','png','bmp','webp','jpeg');
        if(in_array($ext,$allowed_ext))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

}
?>