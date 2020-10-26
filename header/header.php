<title><?php echo $pageTitle; ?></title>
<link rel="stylesheet" type="text/css" href="header.css">
	<header>
	<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  	<a href="http://localhost/Salon/HomePage/HomePage.php">Home</a>
    <a href="http://localhost/Salon/whoweare/whoweare.php">About Us</a>
    <a href="http://localhost/Salon/LeadershipTeam/LeadershipTeam.php">Leadership Team</a>
    <a href="http://localhost/Salon/Services/Services.php">Services</a>
    <a href="http://localhost/Salon/stylefinder/stylefinder.php">Style Finder</a>
    <a href="http://localhost/Salon/contact/contact.php">Contact</a>
    <a href="http://localhost/Salon/profiles/client.php">My Profile</a>
    


  </div>

</div>
	
	<div class="icon" style="cursor:pointer;" onclick="openNav()">
	<div></div>
	<div></div>
	<div></div>
	</div>
	<h1>SSST Hairdressing Salon</h1>
	<a href="../BookingPage/dd_bh.php">
	<div id="booking">
		BOOK ONLINE
	</div>
</a>


</header>
<div class="clear"></div>
<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>

