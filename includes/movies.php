<?php if(!defined('DVD_PATH'))
   {
    die(header("HTTP/1.1 500 Internal Server Error"));
   }  
   else{
     ?>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <span class="close">&times;</span>
	<span id='trailer'></span>
  </div>
</div>
<section id='movie_list'>
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
$cmd = "SELECT dvdtitles.ASIN AS main,dvdtitles.Title AS title,dvdtitles.Image AS image,movie_list.YID AS youtube_id FROM dvdtitles JOIN movie_list ON dvdtitles.ASIN=movie_list.ASIN GROUP BY dvdtitles.ASIN";
$query = $dbs->query($cmd) or die($dbs->error);
while($movie_list = $query->fetch_assoc())
{
?>
  <div class="column">
    <a href='#'><img src="<?php echo IMGDISP2.$movie_list['main'];?>" alt="<?php echo $movie_list['title'] ?>"></a>
    <div class="middle">
    <div class="text"><button class="button" onclick='frameYoutube("<?php echo $movie_list['youtube_id'];?>")'><span><?php echo $movie_list['title'] ?></span></button></div>
  </div>
  </div>
<?php
}
?>
</div>
</section>
<?php
   }
   ?>