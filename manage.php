<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Manage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
    <style>
        body
        {
            background-color: rgba(165, 240, 238,0.6);
        }
        h1
        {
            font-family: 'Quintessential', cursive;
        }
        form
        {
            padding-top: 2%;            
            background-color: rgba(146, 225, 247,0.8);
        }
        input[type="submit"]
        {
            margin-left: 35%;
            width: 30%;
        }
        input[type="text"],input[type="number"]
        {
            width: 80%;
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
        </div>
    </nav>
    <div class="container">
        <h1>Add Student</h1>
        <form action="" method="POST" class="form" onsubmit="return(form_validation());">
            <div class="mb-4 row" >
                <label for="name" class="col-sm-3 col-form-label">Roll Number</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="roll_no" name="roll_no" required>
                </div>
            </div>

            <div class="mb-4 row">
                <label for="email" class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
            </div>

            <div class="mb-4 row">
                <label for="pw" class="col-sm-3 col-form-label">Division</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="division" name="division" required>
                </div>
            </div>

            <div>
                <input type="submit" name="submit1" class="btn btn-primary col-sm-12" value="Add Student">
            </div>  
        </form>
    </div>
    <div class="container">
        <h1>Remove Student</h1>
        <form action="" method="POST" class="form" onsubmit="return(form_validation());">
            <div class="mb-3 row">
                <label for="name" class="col-sm-3 col-form-label">Roll Number</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="roll_no" name="roll_no" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pw" class="col-sm-3 col-form-label">Division</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="division" name="division" required>
                </div>
            </div>

            <div class="mb-3 row">
                <input type="submit" name="submit2" class="btn btn-primary col-sm-12" value="Remove Student">
            </div>  
        </form>
    </div>
    <?php
        include('DB_Connect.php');
        
        if(isset($_POST['submit1'])) {
            
            $roll_no = $_POST['roll_no'];
            $full_name = $_POST['full_name']; 
            $division = $_POST['division']; 

            $sql = "INSERT INTO students (roll_no,full_name,division)
                VALUES ('$roll_no','$full_name','$division')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "<div class='alert alert-success'>SUCCESS: Value added successfully "."</div>"; 
                } 
                else {
                    echo "<div class='alert alert-danger'>ERROR: Could not insert values.Please try again! ".mysqli_error($conn)."</div>";
                }
            }
            if(isset($_POST['submit2'])) {
            
            $roll_no = $_POST['roll_no'];
            $full_name = $_POST['full_name']; 
            $division = $_POST['division'];

            $sql = "DELETE FROM students WHERE roll_no='$roll_no' and division='$division'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "<div class='alert alert-success'>SUCCESS: Value removed successfully "."</div>"; 
                } 
                else {
                    echo "<div class='alert alert-danger'>ERROR: Could not remove values.Please try again. ".mysqli_error($conn)."</div>";
                }
            }
        mysqli_close($conn);
    ?>
</body>
</html>