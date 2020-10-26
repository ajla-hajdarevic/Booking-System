<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
$pageTitle = 'Leadership Team';
include('../header/header.php'); ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../header/header.css">
	<link rel="stylesheet" type="text/css" href="../footer/footeri.css">

	<style>
		#team-overview {
			text-align: center;
		}
		#team-overview img {
			width: 150px;
		}
		.team-member {
			display: none;
		}
		.team-member.active {
			display: block;
		}
	</style>
	<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function() { // wait until DOM is ready
		document.getElementById("team-overview").addEventListener("click", function (event) { // add event listener
		  if (event.target.classList.contains("show-member")) { // check if clicked item has show-member class
		    var memberNumber = event.target.getAttribute("data-member"); //get the value of data-member attribute
		    document.getElementsByClassName('active')[0].classList.remove('active'); //find an element with "active" class and remove that class
		    document.getElementById("member" + memberNumber).classList.add('active'); //find appropriate element for member details by ID and add the active class to it
		  }
		});
	});
	</script>
</head>
<div id="black">
		<h2>LEADERSHIP TEAM</h2>
		</div>

<body>
	
	
	<div id="zaslon">
		<img id="main" src="zaslon.png">
		<div class="centered">
			<h1 id="dekor">LEADERSHIP</h1><br><br>
			<p id="tim">team</p>
			

		</div>
	</div>

	<div id="team-overview">
		<img class="show-member" src="ZakMascolo.jpg" alt="Image" data-member="1">
		<img class="show-member" src="team-anthony.jpg" alt="Image" data-member="2">
		<img class="show-member" src="team-bruno.jpg" alt="Image" data-member="3">
	</div>

	<section id="member1" class="team-member active">
		<img id="small" src="ZakMascolo.jpg" alt="Image">
		<h2> Doris </h2>
		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum orci sed interdum egestas. Suspendisse lobortis odio vitae purus tincidunt, vel tempor lacus vestibulum. Ut eu lacus dui. Quisque faucibus nisl ac dui rutrum accumsan. Fusce ultrices massa vel sem tincidunt ultricies. Nunc rutrum tristique tincidunt. Fusce ullamcorper urna vel ante elementum placerat. Cras sed tortor at neque suscipit placerat vel quis leo. Cras dapibus commodo nunc ac accumsan. Morbi eget nunc semper, feugiat tortor vitae, vehicula velit. Maecenas scelerisque sollicitudin massa at rhoncus. Vivamus eleifend lectus dolor, vitae pulvinar lorem tincidunt ut.


		
	</p>
	</section>

	<section id="member2" class="team-member">
		<img id="small" src="team-anthony.jpg" alt="Image">
		<h2> Bruno </h2>
		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum orci sed interdum egestas. Suspendisse lobortis odio vitae purus tincidunt, vel tempor lacus vestibulum. Ut eu lacus dui. Quisque faucibus nisl ac dui rutrum accumsan. Fusce ultrices massa vel sem tincidunt ultricies. Nunc rutrum tristique tincidunt. Fusce ullamcorper urna vel ante elementum placerat. Cras sed tortor at neque suscipit placerat vel quis leo. Cras dapibus commodo nunc ac accumsan. Morbi eget nunc semper, feugiat tortor vitae, vehicula velit. Maecenas scelerisque sollicitudin massa at rhoncus. Vivamus eleifend lectus dolor, vitae pulvinar lorem tincidunt ut.

		

		
	</p>
	</section>

	<section id="member3" class="team-member">
		<img id="small" src="team-bruno.jpg" alt="Image">
		<h2> Zak </h2>
		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum orci sed interdum egestas. Suspendisse lobortis odio vitae purus tincidunt, vel tempor lacus vestibulum. Ut eu lacus dui. Quisque faucibus nisl ac dui rutrum accumsan. Fusce ultrices massa vel sem tincidunt ultricies. Nunc rutrum tristique tincidunt. Fusce ullamcorper urna vel ante elementum placerat. Cras sed tortor at neque suscipit placerat vel quis leo. Cras dapibus commodo nunc ac accumsan. Morbi eget nunc semper, feugiat tortor vitae, vehicula velit. Maecenas scelerisque sollicitudin massa at rhoncus. Vivamus eleifend lectus dolor, vitae pulvinar lorem tincidunt ut.

		

		
	</p>
	</section>
	<?php 
include('../footer/footer.php'); ?>


</body>
</html>