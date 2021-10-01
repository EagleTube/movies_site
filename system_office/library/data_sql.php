<?php
class sql_functions
{
    private $displayAll;
    public function displayAllData($sql,$table1,$table2,$table3,$colum1,$column2)
    {
        $cmd = "SELECT $table1.$colum1,Title,Price,Image,GROUP_CONCAT(CONCAT(fname,' ',lname) SEPARATOR ',') AS 
        Actor FROM $table1 JOIN $table3 ON $table1.$colum1=$table3.$colum1 JOIN $table2 ON 
        $table2.$column2=$table3.$column2 GROUP BY $table1.$colum1;";
        $query = $sql->query($cmd) or die($sql->error);
        return $query;
    }
    public function displayData($sql,$table)
    {
        $cmd = "SELECT * FROM $table";
        $query = $sql->query($cmd) or die($sql->error);
        return $query;
    }
    public function deleteDVD($sql,$table,$column,$id)
    {
        $cmd = "SELECT ASIN FROM movie_list WHERE $column='$id'";
        $queryX = $sql->query($cmd);
        $row = $queryX->fetch_assoc();
        if(isset($row['ASIN'])||$row['ASIN']!='')
        {
            $check = "DELETE FROM movie_list WHERE $column='$id'";
            $query = $sql->query($check) or die("<script>window.history.back();</script>");
            $check1 = "DELETE FROM $table WHERE $column='$id'";
            $query1 = $sql->query($check1) or die("<script>window.history.back();</script>");
        }
        else
        {
            $check = "DELETE FROM $table WHERE $column='$id'";
            $query = $sql->query($check) or die(header('Location:'.ADMIN_PATH));
        }
    }
    public function deleteDVD2($sql,$table,$column1,$column2,$id1,$id2)
    {
        $check = "DELETE FROM $table WHERE $column1='$id1' AND $column2='$id2'";
        $query = $sql->query($check) or die(header('Location:'.ADMIN_PATH));
    }
    public function addDVD($sql,$table,$encoded,$lvl)
    {
        $data = explode('||',$encoded);
        switch($lvl)
        {
            case 1:
                $data0 = $sql->real_escape_string(base64_decode($data[0]));
                $data1 = $sql->real_escape_string(base64_decode($data[1]));
                $data2 = $sql->real_escape_string(base64_decode($data[2]));
                $data3 = $sql->real_escape_string(base64_decode($data[3]));
                $addX = "INSERT INTO $table VALUES('$data0','$data1','$data2','$data3')";
                $querX = $sql->query($addX) or die(W_Table);
            break;
            case 2:
                $data0 = $sql->real_escape_string(base64_decode($data[0]));
                $data1 = $sql->real_escape_string(base64_decode($data[1]));
                $data2 = $sql->real_escape_string(base64_decode($data[2]));
                if(!$this->checkID($sql,$table,$data0))
                {
                    $addX = "INSERT INTO $table(fname,lname) VALUES('$data1','$data2')";
                    $querX = $sql->query($addX) or die(W_Table);
                }
                else
                {
                    $dataX = $data0 + 1;
                    $addX = "INSERT INTO $table VALUES($dataX,'$data1','$data2')";
                    $querX = $sql->query($addX) or die(W_Table);
                }
            break;
            case 3:
                $data0 = $sql->real_escape_string(base64_decode($data[0]));
                $data1 = $sql->real_escape_string(base64_decode($data[1]));
                $addX = "INSERT INTO $table VALUES('$data0',$data1)";
                $querX = $sql->query($addX) or die(W_Table);
            break;
        }
    }
    public function editDVD($sql,$table,$target,$encoded_column,$id,$encoded_data,$lvl)
    {
        $colum = explode("||",base64_decode($encoded_column));
        $data = explode("||",base64_decode($encoded_data));
        switch($lvl)
        {
            case 1:
                $check = "UPDATE $table SET $colum[0]='$data[0]',$colum[1]='$data[1]',
                $colum[2]='$data[2]',$colum[3]='$data[3]' WHERE $target='$id'";
                $query = $sql->query($check) or die($sql->error);
                return $query;
            break;
            case 2:
                $check = "UPDATE $table SET $colum[0]='$data[0]',$colum[1]='$data[1]' WHERE $target='$id'";
                $query = $sql->query($check) or die($sql->error);
                return $query;
            break;
            case 3:
                $check = "UPDATE $table SET $colum[0]='$data[0]',$colum[1]=$data[1] WHERE $colum[0]='$id' AND $colum[1]=$target";
                $query = $sql->query($check) or die($sql->error);
                return $query;
            break;
        }
    }
    public function about_us($sql)
    {
        $cmd = "SELECT * FROM about_us";
        $query = $sql->query($cmd) or die($sql->error);
        return $query;
    }
    public function checkID($sql,$table,$id)
    {
        $cmd = "SELECT * FROM $table WHERE actorID='$id'";
        $query = $sql->query($cmd) or die($sql->error);
        $row = $query->fetch_assoc();
        if(empty($row['actorID']))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    public function dataExisten($sql,$table,$column,$id)
    {
        $cmd = "SELECT * FROM $table WHERE $column='$id'";
        $query = $sql->query($cmd);
        return $query;
    }
    public function dataExisten2($sql,$table,$column1,$column2,$id1,$id2)
    {
        $cmd = "SELECT * FROM $table WHERE $column1='$id1' AND $column2='$id2'";
        $query = $sql->query($cmd);
        return $query;
    }
    public function resetSql($tablename) {
        $query = "ALTER TABLE $tablename AUTO_INCREMENT=0";
    }
    public function imageLocation($sql,$id)
    {
        $cmd = "SELECT Image FROM dvdtitles WHERE dvdtitles.ASIN='$id'";
        $query = $sql->query($cmd) or die($sql->error);
        return $query;
    }
    public function profileLocation($sql,$id)
    {
        $cmd = "SELECT Image FROM about_us WHERE matrix='$id'";
        $query = $sql->query($cmd) or die($sql->error);
        return $query;
    }
    public function imagePreview($type,$loc)
    {
        header('Content-type:'.$type);
        header('Content-length:'.filesize($loc));
        readfile($loc);
    }
}