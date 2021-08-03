<?php 
if(!defined('DVD_PATH'))
{
  die(header("HTTP/1.1 500 Internal Server Error"));
}
else
{
?>
<section class='mainpage'>

<!-- Slideshow container -->

<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="<?php echo _URL_;?>images/bann1.jpg" style="width:100%">
    
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="<?php echo _URL_;?>images/bann2.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="<?php echo _URL_;?>images/avg.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- Homepage -->

    <section class="welcome-body">
<div class="welcome-text">
        <h1>
Welcome To <span>Movie Rentals</span></h1>
<a href="<?php echo _URL_;?>category/movies/">Go To Movies</a>
    </div>
</section>

<!-- Homepage -->
<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>

</section>
<?php } ?>