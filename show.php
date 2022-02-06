<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Report</title>
</head>
<body>
	<form action="" method="POST">
	<div>
                <input type="submit" name="Show" class="btn btn-primary col-sm-12">
            </div>  
        </form>
	<?php
        include('DB_Connect.php');
		
        if(isset($_POST['submit'])) {
        	$sql = "SELECT * FROM attendance";
            
            $att_id = $_POST['att_id'];
            $roll_no = $_POST['roll_no']; 
            $date = $_POST['date']; 
            $status=$_POST['staus']

            echo "<table class='table'><tr>
                            <th>Att_id</th>
                            <th>Roll_no</th>
                            <th>Date</th>
                            <th>Status</th>
                            </tr>";
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $att_id = $_POST['att_id'];
					            $roll_no = $_POST['roll_no']; 
					            $date = $_POST['date']; 
					            $status=$_POST['staus']
                                echo "<tr><td>".$att_id."</td><td>".$roll_no."</td><td>".$date."</td><td>".$status."</td></tr>";
                            }
                            echo "</table>";
        mysqli_close($conn);
    ?>
</body>
</html>