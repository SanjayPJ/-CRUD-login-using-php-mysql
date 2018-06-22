<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Database Connect Updated</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-4">
            <?php
                include 'db.php';
                
                $message = "";
                $host = "localhost";
                $user = "root";
                $password = "";
                $database = "login_details";
                
                connectDB($host, $user, $password, $database);
                
                if($connection){
                    $message .= "Database connection established." . "<br>";
                }else{
                    $message .= "Database connection failed." . "<br>";
                }
                ?>
                    <div class="alert alert-info" role="alert">
                <?php
                    echo $message;
                ?>
                </div>
        </div>
        

    </body>
</html>