<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
        <style>
            body
            {
                background-color: rgba(165, 240, 238,0.6)
            }
            input
            {
                margin: 10px;
            }
            .profileimg
            {
                border-radius: 50%;
                height: 50px;
                width: 50px;
            }
            .container
            {
                background-color: rgba(146, 225, 247,0.8);
                border: 1px solid darkblue;
                border-radius: 20px;
                padding: 30px;
                margin-top: 5%;
                box-shadow: 5px 10px 18px black;
            }
            h1
            {
                font-family: 'Quintessential', cursive;
            }
        </style>
    </head>
<body>
        <?php
        include('DB_Connect.php');
        ?>
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
     <div class="container">
        <h1>Attendance Records</h1>
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                        <label class="form-check-label" for="month">Select Date to see record:</label>
                        <input type="month" name="month" id="month" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-check-label" for="rollno">Enter roll number of the student:</label>
                        <input class="form-control" type="number" name="roll_no" id="rollno" placeholder = "Enter Roll Number" required>
                    </div>
                
                    <input class="btn btn-primary" type="submit" name="submit" value="Show Attendance Records">
                </form>
            </div>
        </div>
        <div class="row">
            <?php
                if(isset($_POST['submit']))
                {
                    $month = $_POST['month'];
                    $m = date("m",strtotime($month));
                    $y = date("Y",strtotime($month));
                    $roll_no = $_POST['roll_no'];
                    $total = 0; 
                    $present = 0;

                    $sql = "SELECT * from students where roll_no = '$roll_no'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                        
                    if($count == 0)
                    {
                        echo "<div class='alert alert-danger'>Roll Number not found</div>";
                    }
                    else
                    {
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['full_name'];

                        $sql1 = "SELECT * from attendance where roll_no = '$roll_no' and MONTH(date)=$m and YEAR(date)=$y ";
                        $result1 = mysqli_query($conn, $sql1);
                        while($row1 = mysqli_fetch_assoc($result1))
                        {
                            $total = $total + 1;
                            if($row1['status']==1)
                            {
                                $present = $present + 1;
                            }
                        }
                        echo "<table class='table'><tr>
                            <th>Month</th>
                            <th>Name</th>
                            <th>Total Days</th>
                            <th>Days Present</th>
                            <th>Days Absent</th>
                            </tr>";
                            echo "<tr><td>" . $month . "</td><td>" . $name . "</td><td>" . $total . "</td><td>" . $present . "</td><td>" . $total - $present . "</td></tr>";
                    }
                }
            ?>
        </div>
    </div>
    </body>
    </html>