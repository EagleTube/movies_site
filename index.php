<!DOCTYPE html>
<html>
<?php
require "php/config.php";
require "constant/define.php";
require "constant/errors.php";
require "php/functions.php";
require "php/security.php";
$dvdX = new db_connection;
$func = new dvd_collections;
$factor = new Security;

$dbs = $dvdX->connectDb();
?>
<head>
<title>Movies Collections</title>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link href='<?php echo _URL_;?>styles.css' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
<style>
  *{
  padding:0;
  margin:0;
  box-sizing:border-box;
}
*, *:before, *:after {
box-sizing: inherit;
}
html {
box-sizing: border-box;
font-family:'Orbitron';
}
header{
  background-image:url("<?php echo _URL_;?>images/banner1.png");
  background-repeat:no-repeat;
  background-size:100% 100px;;
  height:100px;
}
header h3{
  text-align:center;
  color:#fff;
  font-size:20px;
  padding-top:30px;
}
.aboutus{
background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(https://getwallpapers.com/wallpaper/full/9/b/e/374783.jpg);
background-size:cover;
background-repeat: no-repeat;
background-attachment:fixed;
font-family: Arial, Helvetica, sans-serif;
margin: 0;
}
#contact-section #submit{
  cursor:pointer;
  width:67%;
}
#contact-section #results_{
  text-align:center;
}
#contact-section #results_ h3{
  color:#33ff99;
  padding:10px;
}
#contact-section #results_ table{
  width:60%;
  margin:auto;
  padding:5px;
}
#contact-section #results_ table,#results_ td,#results_ tr{
  color:#fff;
  border:1px solid #fff;
  border-collapse:collapse;
  text-align:center;
  }
#request_form #upload{
  cursor:pointer;
}
</style>
</head>

<header>
<h3>Movies Collections</h3>
</header>
<nav id='navbar'>
<form id='searchbar' action='<?php echo _URL_;?>' method='GET'>
<a href='<?php echo _URL_;?>home'>HOME</a>
<a href='<?php echo _URL_;?>category/movies/'>Movies</a>
<a href='<?php echo _URL_;?>page/contact_us'>Contact Us</a>
<a href='<?php echo _URL_;?>page/about_us'>About Us</a>
<a href='<?php echo _URL_;?>page/request_movies'>Request</a>
<a href='<?php echo _URL_;?>system_office/' id='login'>Login</a>
<span id='right'>
<input type='text' name='search' placeholder='Search'>
</span>
</form></nav>
<body>
<?php
if(!isset($_REQUEST['search']))
{
  $url = explode('/',$_SERVER['REQUEST_URI']);
  if(isset($url[2]) && in_array($url[2],_PAGE_))
  {
    switch($url[2])
    {
      case 'category':
      if($url[3]=='movies')
      {
        include('includes/movies.php');
      }
      break;
      case 'page':
        if(!isset($url[4]))
        {
          switch($url[3])
          {
            case 'contact_us':
            include('includes/contact.php');
            break;
            case 'about_us':
            include('includes/about.php');
            break;
            case 'request_movies':
            include('includes/request.php');
            break;
            default:
            include("404.php");
            break;
          }
        }
        else
        {
          include("404.php");
        }
      break;
      case 'home':
      default:
      include("mainpage.php");
      break;
    }
  }
  else
  {
    if(!in_array($url[2],_PAGE_) && $url[2]=='')
    {
      include("mainpage.php");
    }
    else
    {
      include("404.php");
    }
  }
}
else
{
  include('search.php');
}

?>
<?php include("includes/footer.php"); ?>
</body>
</html>