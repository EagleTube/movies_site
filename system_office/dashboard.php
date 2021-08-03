<?php

//http://localhost/dvd/system_office/add?pid=insert&category=dvdtitles&mid=1 | Insert Movie Title
//http://localhost/dvd/system_office/add?pid=insert&category=dvdActors&mid=2 | Actor Name
//http://localhost/dvd/system_office/add?pid=insert&category=actorTitles&mid=3 | Actor titles(ASIN,ID)

if(!defined('DVD_PATH'))
{
    require_once '../../constant/errors.php';
    die(header(_500_));
}
require 'library/data_sql.php';

$exec = new sql_functions;

?>

<div class='Navigation'>
<a href='javascript:void(0)' onclick="viewForm(null,'dashboard')" target='_blank'>Dashboard</a>
<div class='dropmenu'>
<a href='javascript:void(0)' onclick="viewForm('1','view')" id='menu' target='_blank'>View</a>
<div id='dropcontent'>
<a href='javascript:void(0)' onclick="viewForm('1','view')" target='_blank'>Movie Title</a>
<a href='javascript:void(0)' onclick="viewForm('2','view')" target='_blank'>Actor Name</a>
<a href='javascript:void(0)' onclick="viewForm('3','view')" target='_blank'>Actor Titles</a>
<a href='javascript:void(0)' onclick="viewForm('4','view')" target='_blank'>Requests</a>
</div>
</div>
<div class='dropmenu'>
<a href='javascript:void(0)' onclick="viewForm('1','insert')" id='menu' target='_blank'>Insert</a>
<div id='dropcontent'>
<a href='javascript:void(0)' onclick="viewForm('1','insert')" target='_blank'>New Movies</a>
<a href='javascript:void(0)' onclick="viewForm('2','insert')" target='_blank'>Actor Name</a>
<a href='javascript:void(0)' onclick="viewForm('3','insert')" target='_blank'>Actor Titles</a>
</div>
</div>
<div class='dropmenu'>
<a href='javascript:void(0)' id='menu' onclick="viewForm('about','page')" target='_blank'>Edit Page</a>
<div id='dropcontent'>
<a href='javascript:void(0)' onclick="viewForm('about','page')" target='_blank'>About Us</a>
<a href='javascript:void(0)' onclick="viewForm('1','insert')" target='_blank'>Manage Admin</a> 
</div>
</div>
<a href='javascript:void(0)' onclick="viewForm('4','insert')" target='_blank'>Publish Movies</a>
<a href='javascript:void(0)' onclick="viewForm('5','view')" target='_blank'>Documents</a>
<a href='javascript:void(0)' onclick='logOut()' target='_blank'>Logout</a>
</div>
<script>
const prot = window.location.protocol;
const host = window.location.hostname;
const path = window.location.pathname;
//const fullUrl = prot + "//" + host + path;
const fullUrl1 = prot + "//" + host;
const dashboard = fullUrl1 + "/dvd/system_office/";
const outSess = fullUrl1 + "/dvd/system_office/logout";
const insert1 = fullUrl1 + "/dvd/system_office/add?pid=insert&category=dvdtitles&mid=1";
const insert2 = fullUrl1 + "/dvd/system_office/add?pid=insert&category=dvdActors&mid=2";
const insert3 = fullUrl1 + "/dvd/system_office/add?pid=insert&category=actorTitles&mid=3";
const insert4 = fullUrl1 + "/dvd/system_office/add?pid=publish&category=movies";
const view1 = fullUrl1 + "/dvd/system_office/view/dvd_titles";
const view2 = fullUrl1 + "/dvd/system_office/view/dvd_actors";
const view3 = fullUrl1 + "/dvd/system_office/view/actor_titles";
const view4 = fullUrl1 + "/dvd/system_office/view/requests";
const view5 = fullUrl1 + "/dvd/system_office/view/documents";
const about = fullUrl1 + "/dvd/system_office/page/about";
const contact = fullUrl1 + "/dvd/system_office/page/contact";

function logOut()
{
    window.location.replace(fullUrl1+"/dvd/system_office/logout");
}
function deleteID(id)
{
    window.location.replace('../delete?pid='+id);
}
function deleteID2(id1,id2)
{
    window.location.replace('../del?pid='+id1+'&'+id2);
}
function changeForm(checkbox)
{
    if(checkbox.checked==true)
    {
        document.getElementById("uploader").innerHTML = "<input type='text' name='link_image' placeholder='https://website.com/img.png'/>";
    }
    else
    {
        document.getElementById("uploader").innerHTML = "<input type='file' name='image' />";
    }
}
function viewForm(x,y)
{
if(y=='insert')
{
    switch(x)
    {
        case '1':
            window.location.replace(insert1);
        break;
        case '2':
            window.location.replace(insert2);
        break;
        case '3':
            window.location.replace(insert3);
        break;
        case '4':
            window.location.replace(insert4);
        break;
    }
}
else if(y=='dashboard')
{
    window.location.replace(dashboard);
}
else if(y=='page')
{
    switch(x)
    {
        case 'about':
            window.location.replace(about);
        break;
        case 'contact':
            window.location.replace(contact);
        break;
    }
}
else
{
    switch(x)
    {
        case '1':
            window.location.replace(view1);
        break;
        case '2':
            window.location.replace(view2);
        break;
        case '3':
            window.location.replace(view3);
        break;
        case '4':
            window.location.replace(view4);
        break;
        case '5':
            window.location.replace(view5);
        break;
    }
}
}

</script>
<section id='table_display'>
<?php
$action = explode('/',$_SERVER['REQUEST_URI']);
if($action[3]!='')
{
    switch($action[3])
    {
        case 'logout':
            unset($_SESSION['loggedIn']);
            unset($_SESSION['user_role']);
            unset($_SESSION['SESSION_START']);
            unset($_SESSION['XSRF']);
            unset($_SESSION['table']);
            unset($_SESSION['column']);
            unset($_SESSION['columnx']);
            /*setcookie('SESSION_START',null,null,'/dvd/system_office');
            setcookie('SESSION_ID',null,null,'/dvd/system_office');
            setcookie('PHPSESSID',null,null,'/dvd/system_office');
            setcookie('XSRF',null,null,'/dvd/system_office');*/
            session_destroy();
            echo "<script>
            document.cookie = 'SESSION_START=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
            document.cookie = 'SESSION_ID=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
            document.cookie = 'XSRF=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
            window.location.replace('"._URL_."system_office/');</script>";
        break;
        case 'view':
            if($action[4]=='')
            {
                header('Location:'.ADMIN_PATH);
            }
            else
            {
                switch($action[4])
                {
                    case 'dvd_titles':
                        $query = $exec->displayData($dvdSQL,TABLE1);
                        $_SESSION['table']=TABLE1;
                        $_SESSION['column']=COLUMN1;
                        $_SESSION['level']=1;
                        echo "<table>";
                        echo "<th>ASIN</th><th>Title</th><th>Price</th><th>Image</th><th>Action</th>";
                        while($row=$query->fetch_assoc())
                        {
                            echo "<tr><td>" . $row['ASIN'] . "</td><td>" . $row['Title'] . "</td><td>" . $row['Price'] . 
                            "</td><td><img src='" . IMGDISP . $row['ASIN'] . "' width='100' height='100'></td>
                            <td><a href='#delete#' onclick=deleteID('".$row['ASIN']."')>Delete</a> / 
                            <a href='../edit/".$row['ASIN']."/".$_SESSION['level']."'>Edit</a></td></tr>";
                        }
                        echo "</table>";
                    break;
                    case 'dvd_actors':
                        $_SESSION['table']=TABLE2;
                        $_SESSION['column']=COLUMN2;
                        $_SESSION['level']=2;
                        $query = $exec->displayData($dvdSQL,TABLE2);
                        echo "<table>";
                        echo "<th>Actor ID</th><th>First Name</th><th>Last Name</th><th>Action</th>";
                        while($row=$query->fetch_assoc())
                        {
                            echo "<tr><td>" . $row['actorID'] . "</td><td>" . $row['fname'] . "</td><td>" . $row['lname'] . 
                            "</td><td><a href='#delete#' onclick=deleteID('".$row['actorID']."')>Delete</a> / 
                            <a href='../edit/".$row['actorID']."/".$_SESSION['level']."'>Edit</a></td></tr>";
                        }
                        echo "</table>";
                    break;
                    case 'dvd_list':
                        $exec->displayData();
                    break;
                    case 'actor_titles':
                        $_SESSION['table']=TABLE3;
                        $_SESSION['column']=COLUMN1;
                        $_SESSION['columnx']=COLUMN2;
                        $_SESSION['level']=3;
                        $query = $exec->displayData($dvdSQL,TABLE3);
                        echo "<table>";
                        echo "<th>ASIN</th><th>Actor ID</th><th>Action</th>";
                        while($row=$query->fetch_assoc())
                        {
                            echo "<tr><td>" . $row['ASIN'] . "</td><td>" . $row['actorID'] . 
                            "</td><td><a href='#delete#' onclick=deleteID2('".$row['ASIN']."','".$row['actorID']."')>Delete</a> / 
                            <a href='../edit/".$row['ASIN']."/".$_SESSION['level']."/".$row['actorID']."'>Edit</a></td></tr>";
                        }
                        echo "</table>";
                    break;
                    case 'requests':
                        echo "<table>";
                        echo "<th>Name</th><th>Movie Name</th><th>Email</th>";
                        $cmdR = "SELECT * FROM request_movie";
                        $requestR = $dvdSQL->query($cmdR) or die($dvdSQL->error);
                        while($row=$requestR->fetch_assoc())
                        {
                            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['movie'] . "</td><td>" . $row['email']."</td></tr>";
                        }
                        echo "</table>";
                    break;
                    case 'documents':
                        echo "<table>";
                        echo "<tr><td><iframe style='border:1px solid #666CCC' title='PDF in an i-Frame' src='../documents/movie.pdf' frameborder='1' scrolling='auto' height='600' width='500'></iframe></td>";
                        echo "<td><iframe style='border:1px solid #666CCC' title='PDF in an i-Frame' src='../documents/kids.pdf' frameborder='1' scrolling='auto' height='600' width='500'></iframe></td></tr>";
                        echo "<tr><td><iframe style='border:1px solid #666CCC' title='PDF in an i-Frame' src='https://www.rit.edu/studentaffairs/campuslife/sites/rit.edu.studentaffairs.campuslife/files/images/ClubTips_MoviesCopyright.pdf' frameborder='1' scrolling='auto' height='600' width='500'></iframe></td>
                            <td><iframe style='border:1px solid #666CCC' title='PDF in an i-Frame' src='../documents/youtube.pdf' frameborder='1' scrolling='auto' height='600' width='500'></iframe></td></tr>";
                        echo "</table>";
                    break;
                    case 'gallery':
                    break;
                }
            }
        break;
        case 'edit':
            include('library/edit_item.php');
        break;
        case 'page':
            include('library/pages.php');
        break;

    }
    $uri = explode('?pid=',$action[3]);
    if(isset($uri[0]) && isset($uri[1]))
    {
        switch($uri[0])
        {
            case 'delete':
                if($func->issetTableColumn())
                {
                    $idx = $factor->_SQLI(urldecode($uri[1]),$dvdSQL);
                    include('library/delete_item.php');
                }
            break;
            case 'del':
                if($func->issetTableColumn())
                {
                    $idx = $factor->_SQLI(urldecode($uri[1]),$dvdSQL);
                    include('library/delete_item_mul.php');
                }
            break;
            case 'add':
                $idx = $factor->_XSS(urldecode($uri[1]),1,NULL);
                include('library/add_item.php');
            break;
        }
    }
}
else
{
    $query = $exec->displayAllData($dvdSQL,TABLE1,TABLE2,TABLE3,COLUMN1,COLUMN2);
    echo "<table>";
    echo "<th>ASIN</th><th>Title</th><th>Price</th><th>Actor</th><th>Image</th>";
    while($row=$query->fetch_assoc())
    {
        echo "<tr><td>".$row['ASIN']."</td><td>".$row['Title']."</td><td>$".$row['Price'].
             "</td><td>".$row['Actor']."</td><td><img src='".IMGDISP.$row['ASIN']."' width=100 height=100></td></tr>";
    }
    echo "</table>";
}

?>

</section>
