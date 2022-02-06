<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<title>Home</title>
	<style>
		body
		{
			background-color: rgba(165, 240, 238,0.6);
		}
		.animate{
		    background-image:url("imgs/c2.png");
		    height: 400px;
		    animation: a1 8s 2s linear infinite;
		    background-repeat: no-repeat;
		    background-size: 100%;
		    margin: 10px;
		    box-shadow: 5px 10px 18px black;
		}

		@keyframes a1{
		    0%{background-image:url("imgs/c1.jpg");}
		    50%{background-image:url("imgs/c3.jpg");}
		    100%{background-image:url("imgs/c2.png");}
		}
		h1
		{
			font-family: 'Quintessential', cursive;
			margin-left: 40%;
		}
		form
		{
			padding-left: 25%;
			display: flex;
			flex-wrap: wrap;
			background-color:rgba(146, 225, 247,0.8) ;
		}
		.div1
		{
			margin-left: 10%;
		}
		.btn
		{
			margin-top: 2%;
			margin-left: 10%;
			background-color: lightblue;
			height: 40px;
		}
		.btn:hover
		{
			background-color: darkblue;
			color: white;
		}
		.btn1
		{
			margin-top: 2%;
			margin-left: 45%;
			background-color: lightblue;
			height: 40px;
		}
		.btn1:hover
		{
			background-color: darkblue;
			color: white;
		}
		.profileimg
		{
			border-radius: 50%;
			height: 50px;
			width: 50px;
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
		          		<a class="nav-link" href="manage.php">Manage</a>
		        	</li>
		        	<li class="nav-item">
		          		<a class="nav-link" href="record.php">Record</a>
		        	</li>
		      	</ul>
		      	<span class="navbar-text">
		        	<a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
		      	</span>
	    	</div>
	    	<img src="imgs/a1.png" class="profileimg">
	  	</div>
	</nav>
	<div class="animate"></div>
	<h1>Mark Attendance here!</h1>
	<hr>
	<?php
                include('DB_Connect.php');
                if(isset($_POST['mark']))
                {
                    $division = $_POST['division'];
                    $date = $_POST['dt'];
                    $sql = "SELECT * from students where division = '$division'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $rollno = $row['roll_no'];
                        $sql2 = "SELECT * from attendance where date = '$date' and roll_no ='$rollno'";
                        $result2 = mysqli_query($conn, $sql2);
                        $count = mysqli_num_rows($result2);
                        if($count == 1)
                        {
                            echo "<div class='alert alert-danger'>Attendance Already Marked!</div>";
                            break;
                        }
                        if(isset($_POST['s'.$rollno]))
                        {
                            $sql1 = "INSERT into attendance (roll_no,date,status) VALUES ('$rollno','$date','1')";
                        }
                        else
                        {
                            $sql1 = "INSERT into attendance (roll_no,date,status) VALUES ('$rollno','$date','0')";
                        }
                        $result1 = mysqli_query($conn, $sql1);
                    }
                    echo "<div class='alert alert-success'>Attendance Marked!</div>";
                }
            ?>
            <div class="container">
            <div class="row">
                <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                    <label class="form-check-label">Select Date to Mark Attendance</label>
                    <input autofocus class="form-control dateclass" type="date" name="date" required>
                    </div>
                    <div class="form-group div1">
                    <label class="form-check-label lable1">Select Division</label>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="division" value="A" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">Division A</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="division" value="B" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">Division B</label>
                    </div>
                    </div>
                    <input class="btn" type="submit" name="show" value="Show Students">
                </form>
                </div>
            </div>
            <div class="row">
                <form action="" method="post">
                    <?php
                        if(isset($_POST['show']))
                        {
                            $division = $_POST['division'];
                            $date = $_POST['date'];
                            $sql = "SELECT * from students where division = '$division'";
                            $result = mysqli_query($conn, $sql);
                            echo "<input type='hidden' name='division' value = '".$division."'>";
                            echo "<input type='hidden' name='dt' value = '".$date."'>";
                            echo "<div class='alert alert-success'>Division ".$division."</div>";
                            echo "<table class='table'><tr>
                            <th>Roll Number</th>
                            <th>Name</th>
                            <th>Status</th>
                            </tr>";
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $rollno = $row['roll_no'];
                                $name = $row['full_name'];
                                echo "<tr><td>".$rollno."</td><td>".$name."</td><td>
                                <div class='form-check form-switch'>
                                <input class='form-check-input' name='s".$rollno."' type='checkbox' role='switch' id='flexSwitchCheckChecked' checked>
                                </div></td></tr>";
                            }
                            echo "</table>";
                            echo"<input class='btn1' type='submit' name='mark' value='Mark Attendance'>";
                        } 
                    ?>
                </form>
            </div>
        </div>
</body>
</html>