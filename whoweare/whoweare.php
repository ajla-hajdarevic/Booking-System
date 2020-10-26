<!DOCTYPE html>
<html>
<head>
	<title>Who We Are</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../header/header.css">
	<link rel="stylesheet" type="text/css" href="../footer/footeri.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
$pageTitle = 'Home Page';
include('../header/header.php'); ?>
</head>
<div class="clear"></div>

<div id="black">
		<h2>ABOUT US</h2>
		<div class="podnaslovi">
			<a href="#gallery">GALLERY</a>
			<a href="#paragrafi">OUR STORY</a>
		
	</div>
		</div>

	<div class="clear"></div>

<body>

<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>

	<div id="slike">
		<img src="whoweare.png" alt="slika">
		<div class="centered">
			<h1>Who We Are</h1>
			<p>What makes our salon unique is our iconic brand. With over five decades of experience, we are international leaders in the hairdressing industry, setting new standards for hairdressers and making education available globally. Our mission is to upgrade the industry one hairdresser at a time.</p>
		</div>
		<div class="clear"></div>
	</div>

	<article id="paragrafi" >
		
			<p>After their father, an entrepreneurial hairdresser and salon owner himself moved his family to London, the brothers continued Franco's legacy by opening up the very first TONIandGUY salon in the South of London.The brothers then embarked on a new venture, expanding TONIandGUY to North America with the first TONIandGUY salon location in Dallas, Texas.</p><br>
			<p>
			Next in their mission to take North America by storm, they launched the TIGI product line. Half a decade later, they expanded even further with the first TONIandGUY hairdressing academy. This new division of the brand was a natural progression in the TONIandGUY philosophy of education and continued training.</p><br>
			<p>TONIandGUY established their name and created a legacy in their first 20 years in business throughout London. The brothers then embarked on a new venture, expanding TONIandGUY to North America with the first TONIandGUY salon location in Dallas, Texas. Next in their mission to take North America by storm, they launched the TIGI product line. Half a decade later, they expanded even further with the first TONIandGUY hairdressing academy. This new division of the brand was a natural progression in the TONIandGUY philosophy of education and continued training.</p>

			</article>

	<div class="slideshow-container" id="gallery">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img class="slikesalona" src="hair.png" style="width:100%">
   
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img class="slikesalona" src="salon.jpg" style="width:100%">
  
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img class="slikesalona" src="interior.jpg" style="width:100%">
  
  </div>

 
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<script type="text/javascript">
var slideIndex = 0;
showSlides();


function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
   slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
	
			
		
<?php 
include('../footer/footer.php'); ?>
	</body>
</html>

