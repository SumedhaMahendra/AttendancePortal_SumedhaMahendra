<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
	<style>
		body
		{
			background-color: rgba(165, 240, 238,0.6);
		}
		.profilediv
		{
			margin: 20px;
			display: flex;
			flex-wrap: wrap;
		}
		.div2,.div3
		{
			width: 35%;
			margin: 20px;
			display: inline-block;
			margin-left: 150px;
		}
		.card1,.card2,.card3,.card4
		{
			box-shadow: 5px 10px 18px black;
			margin-bottom: 50px;
		}
		h1
		{
			font-family: 'Quintessential', cursive;
			margin-left: 40%;
		}
		.card1:hover
		{
			transform: scale(1.2);
		}
		.card2:hover
		{
			transform: scale(1.2);
		}
		.card3:hover
		{
			transform: scale(1.2);
		}
		.card4:hover
		{
			transform: scale(1.2);
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  	<div class="container-fluid">
	    	<a class="navbar-brand" href="home.php">Attendance Portal</a>
	    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	      	<span class="navbar-toggler-icon"></span>
	    	</button>
	    	<div class="collapse navbar-collapse" id="navbarText">
		      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        	<li class="nav-item">
		          		<a class="nav-link" href="Profile.php">My Profile</a>
		        	</li>
		        	<li class="nav-item">
		          		<a class="nav-link" href="manage.php">Manage</a>
		        	</li>
		      	</ul>
		      	<span class="navbar-text">
		        	<a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
		      	</span>
	    	</div>
	  	</div>
	</nav>
	<?php
		$sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

	<div class="profilediv">
		<div>
			<div class="card mb-3" style="max-width: 100%;">
		  		<div class="row g-0">
			    	<div class="col-md-4">
			      		<img src=".$row['picture']." class="img-fluid rounded-start" alt="...">
			    	</div>
		    		<div class="col-md-8">
		      			<div class="card-body">
		        			<h5 class="card-title">Card title</h5>
		        			<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		        			<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Toggle width collapse</button>
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
		<div>
			<div style="min-height: 120px;">
  				<div class="collapse collapse-horizontal" id="collapseWidthExample">
    				<div class="card card-body" style="width: 300px;">
      					You don't have editing right! Please contact your admin!
    				</div>
  				</div>
			</div>
		</div>
	</div>
	<hr>
	<h1>Your Department:</h1>
	<div class="div2">
		<div class="card1">
			<div class="card mb-3" style="max-width: 100%;">
		  		<div class="row g-0">
			    	<div class="col-md-4">
			      		<img src="imgs/a1.png" class="img-fluid rounded-start" alt="...">
			    	</div>
		    		<div class="col-md-8">
		      			<div class="card-body">
		        			<h5 class="card-title">Ms. Palvi</h5>
		        			<p class="card-text">HTML, CSS, JavaScript, PHP</p>
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
		<div class="card2">
			<div class="card mb-3" style="max-width: 100%;">
		  		<div class="row g-0">
			    	<div class="col-md-4">
			      		<img src="imgs/a2.png" class="img-fluid rounded-start" alt="...">
			    	</div>
		    		<div class="col-md-8">
		      			<div class="card-body">
		        			<h5 class="card-title">Mr. Harshil</h5>
		        			<p class="card-text">Python</p>
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
	</div>
	<div class="div3">
		<div class="card3">
			<div class="card mb-3" style="max-width: 100%;">
		  		<div class="row g-0">
			    	<div class="col-md-4">
			      		<img src="imgs/a2.png" class="img-fluid rounded-start" alt="...">
			    	</div>
		    		<div class="col-md-8">
		      			<div class="card-body">
		        			<h5 class="card-title">Mr. Aditya</h5>
		        			<p class="card-text">Advance Web Programming</p>
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
		<div class="card4">
			<div class="card mb-3" style="max-width: 100%;">
		  		<div class="row g-0">
			    	<div class="col-md-4">
			      		<img src="imgs/a1.png" class="img-fluid rounded-start" alt="...">
			    	</div>
		    		<div class="col-md-8">
		      			<div class="card-body">
		        			<h5 class="card-title">Mrs. Aditi</h5>
		        			<p class="card-text">Artificial Intelligence</p>
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
	</div>
</body>
</html>