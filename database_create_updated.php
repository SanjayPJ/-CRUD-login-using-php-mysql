<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>mysql</title>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <style>
        body {
            font-family: 'Muli', sans-serif;
        }
        .form-container{
            margin-top: 100px;
            width: 40%;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #EEE;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="pt-3 form-container" method="post" action="database_create_updated.php">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            
            <?php
            
                include 'db.php';
            
                //get value from the form
                if(isset($_POST["submit"])){
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    //creating database connection
            
                    $host = "localhost";
                    $user = "root";
                    $db_password = "";
                    $database = "login_details";
                    connectDB($host, $user, $db_password, $database);
                    $message = "";
                    
                    $username = mysqli_real_escape_string($connection , $username);
                    $password = mysqli_real_escape_string($connection , $password);
                    
                    $hashFormat = "$2y$10$";
                    $salt = "iusesomecrazystrings22";
                    $hashFormat_and_salt = $hashFormat . $salt;
                    $password = crypt($password, $hashFormat_and_salt);
                    
                    if($connection){
                        
                        createDB($username, $password);
                        
                    }else{
                        $message .= "Database connection failed."  . "<br>";               
                    }

                }
            
            ?>
            <button type="submit" class="btn btn-primary w-100" name="submit">Create</button>
        </form>
    </div>

</body>

</html>
