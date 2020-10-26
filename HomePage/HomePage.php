<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="HomePage.css">
	<link rel="stylesheet" type="text/css" href="../header/header.css">
	<link rel="stylesheet" type="text/css" href="../footer/footeri.css">
	 <?php 
$pageTitle = 'Home Page';
include('../header/header.php'); ?>
</head>
<body>
	
<div class="stylefinder">
	
	<img class="mySlides" src="men.png" alt="image">
	<img class="mySlides" src="next1.png" alt="image">
	<img class="mySlides" src="next2.png" alt="image">
	<img class="mySlides" src="men1.png" alt="image">
	<img class="mySlides" src="next3.png" alt="image">
	<img class="mySlides" src="next4.png" alt="image">
	<img class="mySlides" src="men2.png" alt="image">
	<img class="mySlides" src="next5.png" alt="image">
	
</div>
<script type="text/javascript">
	var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>



<div class="tekst">
	<div class="content">
	<h1>STYLE FINDER</h1>
	<p>Ready to head out to the salon for a restyle? Let our wide ranging collection of trend-led hairstyles and colours inspire you.</p>
		<a href="http://localhost/Salon/stylefinder/stylefinder.php">
			<h4>FIND YOUR STYLE</h4>
		</a>
	</a>
	</a>
	</div>
	</div>

<div class="clear"></div>
<div class="aboutus">
	<div class="contentleft">
	<div class="sadrzaj">
	<h1>ABOUT US</h1>
	<p>Multi-award winning hairdressing brand with more than 50 years of experience in education, superior client service and haircare expertise.</p>
	<a href="http://localhost/Salon/whoweare/whoweare.php">
		<h4>READ MORE</h4>
	</a>
</div>
</div>
<img src="about.png" alt="slika">
</div>
	<div class="clear"></div>


<div class="location">
	<img src="style.png" id="zadnja" alt="slika">
	<div class="content2">
		<div class="content">
	
	<h1>SALON FINDER</h1>
	<p>We have built our legacy on providing clients with precision cuts inspired by our British roots combined with personalized style to fit our clients’ individual needs and lifestyle.</p>
	<a href="http://Salon/localhost/contact/contact.php">
		<h4>FIND OUR SALON</h4>
</a>
	</div>
</div>
</div>
<div class="clear"></div>
<?php 
include('../footer/footer.php'); ?>
</body>
</html>