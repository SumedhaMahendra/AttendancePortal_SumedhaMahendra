<html>
    <head>
        <title>Register</title>
        <link rel="icon" href="imgs/favicon.jpg" type="image/ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            body
            {
                background-image: url("imgs/bg.jpg");
                background-repeat: no-repeat;
                background-size: 100%;
            }
            .form{
                padding-left: 15%;
                padding-right: 15%;
                padding-top: 2%;
                background-color: rgba(146, 225, 247,0.8);
                box-shadow: 5px 10px 18px black;
                border-radius: 25px;
            }
            .btn{
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .container
            {
                margin: 8%;
            }
        </style>
        <script type="text/javascript">
            function form_validation()
            {
                var x=document.getElementById("pw").value;
                var passtype = /(?=.*[a-z])(?=.*[0-9])(?=.*[$@#/&]).{5,15}$/;
                if(!x.match(passtype)){
                    alert("Please enter the password in the correct format (Atleast 1 letter, 1 number and 1 spl character)!");
                    return false;
                }

                var y = document.getElementById("num").value;
                var num = /^[0-9]{10,10}$/;
                if(!y.match(num)){
                    alert("Contact number should be of 10 digits!");
                    return false;
                }
                return true;
            }
        </script>
    </head>
<body>
    <?php
        include('DB_Connect.php');
        
        if(isset($_POST['submit'])) {

            $file=$_POST['file'];
            $email = $_POST['email'];
            $password = $_POST['password']; 
            $c_password = $_POST['c_password']; 
            $name = $_POST['name'];

            $sql = "SELECT user_id FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
                   
            if($count == 1) {
                echo "<div class='alert alert-danger'>Account with this Email already Exists!</div>";
            }
            else  if ($password != $c_password){
                echo "<div class='alert alert-danger'>Password and Confirm Password must be same!</div>";
            }
            else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name,password,email,picture)
                VALUES ('$name','$password','$email','$file')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    session_start();
                    $sql = "SELECT user_id FROM users WHERE email = '$email'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    $_SESSION['login_user'] = $row['user_id'];
                    header("location: home.php");   
                } 
                else {
                    echo "<div class='alert alert-danger'>ERROR: Could not insert values ".mysqli_error($conn)."</div>"; //change
                }
            }
        }
        mysqli_close($conn);
    ?>
    <div class="container">
        <h2 class="alert alert-info">Register</h2>
        <form action="" method="POST" class="form" onsubmit="return(form_validation());">
            <div class="mb-3 row">
                <label for="name" class="col-sm-3 col-form-label">Upload File</label>
                <div class="col-sm-9">
                    <input type="File" class="form-control" id="file" name="file" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pw" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="pw" name="password" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cpw" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="cpw" name="c_password" required>
                </div>
            </div>

            <div class="mb-3 row">
                <input type="submit" name="submit" class="btn btn-primary col-sm-12">
            </div>  
        </form>
               
        <div class="alert alert-info">
            Already have an account? <a class="alert-link" href="login.php">Login here.</a>
        </div>
    </div>
        
    </body>
</html>

    