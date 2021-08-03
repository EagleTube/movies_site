<?php
if(!defined('DVD_PATH'))
{
    require_once '../constant/errors.php';
    die(header(_500_));
}
if(isset(_DATA_[DVD_LOGIN]))
{
    $username = _DATA_[DVD_USER];
    $password = _DATA_[DVD_PASS];
    $xsrf_token = _DATA_[DVD_XSRF];
    if($xsrf_token!=$_SESSION['XSRF'])
    {
        setcookie('XSRF',null);
        echo "<script>alert('You submitted wrong xsrf-token');window.location.replace('".ADMIN_PATH."');</script>";
    }
    else
    {
        if($func->administrator($dvdSQL,$username,sha1($password)))
        {
            $_SESSION['loggedIn'] = base64_encode(bin2hex(mt_rand(99999,9999999)));
            $_SESSION['user_role'] = 'admin';
            $_SESSION['SESSION_START'] = crypt($_SESSION['loggedIn'],"$1$9__DVD__");
            setrawcookie('SESSION_START',$_SESSION['SESSION_START'],(time()+18000),ADMIN_PATH);
            setrawcookie('SESSION_ID',mt_rand(0,255),(time()+18000),ADMIN_PATH);
            header('Location:'.ADMIN_PATH);
        }
        else
        {
            echo "<script>alert('Invalid Credentials');window.location.replace('".ADMIN_PATH."');</script>";
        }
    }
}
else
{
    if(!isset($_COOKIE['XSRF']))
    {
        $token = $func->generate_token(STRING_TOKEN,TOKEN_LENGTH);
        $_SESSION['XSRF'] = $token;
        setcookie('XSRF',$token);
        header('Location:'.ADMIN_PATH);
    }
    ?>
	
	<style>

.loginForm h1 {
  margin: -20px -20px 21px;
  line-height: 60px;
  font-size: 20px;
  font-weight: bold;
  color: #555;
  text-align: center;
  text-shadow: 0 1px white;
  background: #f3f3f3;
  border-bottom: 1px solid #cfcfcf;
  border-radius: 3px 3px 0 0;
  background-image: -webkit-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -moz-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -o-linear-gradient(top, whiteffd, #eef2f5);
  background-image: linear-gradient(to bottom, whiteffd, #eef2f5);
  -webkit-box-shadow: 0 1px whitesmoke;
  box-shadow: 0 1px whitesmoke;
}

.loginForm :-moz-placeholder {
  color: #c9c9c9 !important;
  font-size: 13px;
}

.loginForm ::-webkit-input-placeholder {
  color: #ccc;
  font-size: 13px;
}

.loginForm input {
  font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
  font-size: 14px;
}

.loginForm input[type=text], input[type=password] {
  margin: 5px;
  padding: 0 10px;
  width: 200px;
  height: 34px;
  color: #404040;
  background: white;
  border: 1px solid;
  border-color: #c4c4c4 #d1d1d1 #d4d4d4;
  border-radius: 2px;
  outline: 5px solid #eff4f7;
  -moz-outline-radius: 3px;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
}

.loginForm input[type=text]:focus, input[type=password]:focus {
  border-color: #7dc9e2;
  outline-color: #dceefc;
  outline-offset: 0;
}

.loginForm input[type=submit] {
  padding: 0 18px;
  height: 29px;
  font-size: 12px;
  font-weight: bold;
  color: #527881;
  text-shadow: 0 1px #e3f1f1;
  background: #cde5ef;
  border: 1px solid;
  border-color: #b4ccce #b3c0c8 #9eb9c2;
  border-radius: 16px;
  outline: 0;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  background-image: -webkit-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: -moz-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: -o-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: linear-gradient(to bottom, #edf5f8, #cde5ef);
  -webkit-box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
  box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
}

.loginForm input[type=submit]:active {
  background: #cde5ef;
  border-color: #9eb9c2 #b3c0c8 #b4ccce;
  -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
}

.loginForm input[type=text], .loginForm input[type=password] {
  line-height: 34px;
}
.loginForm form{
    width:50%;
    margin:auto;
    text-align:center;
    margin-top:15%;
}
.loginForm{
    height:100vh;
    background:#111;
}
	</style>
<section class='loginForm'>
    <h1>Admin Login</h1>
  
  <form method="post" action="">
    <p><input type="text" name="username" placeholder="username"></p>
    <p><input type="password" name="password" placeholder="password"></p>
    <p><input type="hidden" name="csrf-token" value="<?php echo $_COOKIE['XSRF']; ?>"></p>
	<p><input type="submit" name="login" value="login"></p>
    
  </form>
</div>
</section>
    <?php
}
?>