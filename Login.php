<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
	<style>
		body
		{
			background-image: url("imgs/bg.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		.maindiv
		{
			box-shadow: 5px 10px 18px black;
			border-radius: 25px;
			margin-top: 10%;
			margin-left: 10%;
			background-color: rgba(146, 225, 247,0.6);
			width: 80%;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.subdiv1
		{
			width: 50%;
			margin-top: 5%;
			margin-bottom: 5%;
		}
		.subdiv2
		{
			margin-top: 5%;
			margin-bottom: 5%;
			margin-right: 5%;
		}
		.formclass
		{
			margin-left: 50%;
			width: 100%;
		}
		h1
		{
			font-family: 'Quintessential', cursive;
		}
		p
		{
			font-family: 'Montserrat', sans-serif;
			color: darkblue;
		}
		.btn:hover
		{
			background-color: darkblue;
		}
		span
		{
			animation-name: a1;
		    animation-duration: 1s;
		    animation-iteration-count: infinite;
		    animation-direction: alternate;
		    animation-timing-function: linear;
		}
		@keyframes a1 {
		    0%{color: yellowgreen;}
		    50%{color: magenta;}
		    100%{color: red;}
		}
	</style>
</head>
<body>
	<?php
        include('DB_Connect.php');
        
        if(isset($_POST['submit'])) {
            echo "hello";
            $email = $_POST['email'];
            $password = $_POST['password']; 
            
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
                   
            if($count == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $pw = $row['password'];
                if(!password_verify($password, $pw)){

                    echo "<div class='alert alert-danger'>Your Email or Password is invalid!!!!!! ".$password." ".$pw."</div>";;
                }
                else{
                    session_start();
                    $_SESSION['login_user'] = $row['user_id'];
                    header("location: home.php");
                }
            }
            else {
                echo "<div class='alert alert-danger'>Your Email or Password is invalid!</div>";
            }
        }
        mysqli_close($conn);
    ?>
	<div class="maindiv">
		<div class="subdiv1">
			<h1>Welcome to SVKM Attendance Portal!</h1>
			<p>You are about to log in to the world of Online Learning at NMIMS.<br><br>A world made possible due to a combination of <span>30 years</span> of legacy of best in class education and state of the art learning technology!Log in using the credentials given by the University.Please go through your profile details and update your contact information, it will help University to stay in touch with you.<br><br>With this Portal, we hope to provide you all the support you need during your enrollment with the Program offered by the University.It will be our endeavour to keep improving your experience with this Portal as we go along.</p>
		</div>
		<div class="subdiv2">
			<form class="formclass" action="" method="POST">
			  	<div class="mb-3">
			    	<label for="exampleInputEmail1" class="form-label">Email address</label>
			    	<input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
			    	<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
			  	</div>
			  	<div class="mb-3">
			    	<label for="exampleInputPassword1" class="form-label">Password</label>
			    	<input type="password" class="form-control" id="exampleInputPassword1" name="password">
			  	</div>
			  	<div class="alert alert-primary">
                    Don't have an account? <a class="alert-link" href="register.php">Register here.</a>
                </div>
			  	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	<div>
</body>
</html>