
<?php if(!defined('DVD_PATH'))
   {
    die(header("HTTP/1.1 500 Internal Server Error"));
   }  
   else{
    $_SESSION['found']=false;
     ?>
    <div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <span class="close">&times;</span>
	<span id='trailer'></span>
  </div>
</div>
<section id='movie_list'>
<h1 style='text-align:center;color:#fff;'>Search for "<?php echo $factor->_XSS($_REQUEST['search'],1,'');?>"</h1>
<script>
var modal = document.getElementById("myModal");
var trailer = document.getElementById("trailer");
var span = document.getElementsByClassName("close")[0];
function frameYoutube(id)
{
	trailer.innerHTML = "<iframe class='youtube-video' src='https://www.youtube.com/embed/"+id+"?enablejsapi=1&version=3&playerapiid=ytplayer' frameborder='0' allowfullscreen></iframe>";
	modal.style.display = "block";
}
$('span.close').click(function () {
  $('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
  modal.style.display = "none";
});
window.onclick = function(event) {
  if (event.target == modal) {
    $('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
    modal.style.display = "none";
  }
}
</script>
<div class="row">
  <?php
  $search = $factor->_SQLI($_REQUEST['search'],$dbs);
  $cmdQ = "SELECT dvdtitles.Title,dvdtitles.Image,movie_list.YID FROM dvdtitles JOIN movie_list ON dvdtitles.ASIN=movie_list.ASIN WHERE (Title LIKE '$search%' OR Title LIKE '%$search%' OR Title LIKE '% $search')";
  $queryQ = $dbs->query($cmdQ) or die($dbs->error);
  while($rowQ=$queryQ->fetch_assoc())
  {
      ?>
  <div class="column">
    <a href='#'><img src="<?php echo "files/".$rowQ['Image'];?>" alt="<?php echo $rowQ['Title'] ?>"></a>
    <div class="middle">
    <div class="text"><button class="button" onclick='frameYoutube("<?php echo $rowQ['YID'];?>")'><span><?php echo $rowQ['Title'] ?></span></button></div>
  </div>
  </div>
      <?php
      $_SESSION['found']=true;
  }
  if($_SESSION['found']==false)
  {
      ?>
      <h1 style='text-align:center;color:#fff;'>No match found!</h1>
      <?php
  }
  ?>
</div>
</section>
  <?php
   }
   ?>