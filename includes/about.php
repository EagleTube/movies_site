<?php if(!defined('DVD_PATH'))
   {
    die(header("HTTP/1.1 500 Internal Server Error"));
   }  
   else{
     ?>
<section class ="aboutus">
<div class="about-section">
  <h1>About Us Page</h1>
  <p>Example</p>
  <p>Example 2</p>
</div>
<h2 style="text-align:center;color:#fff">Our Team</h2>
<div class="row">
<?php 
$abc = "SELECT * FROM about_us";
$query = $dbs->query($abc);
while($rows=$query->fetch_assoc())
{
?>
   <div class="column">
    <div class="card">
      <img src="<?php echo IMGDISP3 . $rows['matrix'] ; ?>"  alt="<?php echo $rows['name']; ?>" style="width:100%;height:230px;">
      <div class="container">
        <h2><?php echo $rows['name']; ?></h2>
        <p class="title"><?php echo $rows['position']; ?></p>
        <p><?php echo $rows['email']; ?></p>
      </div>
    </div>
    </div>
<?php
}
   }
   ?>
</div>
</section>