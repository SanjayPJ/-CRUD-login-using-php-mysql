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
    </style>
</head>

<body>
    <div class="container mt-3">
        <?php
            $host = "localhost";
            $db_user = "root";
            $db_password = "";
            $database = "login_details";
            $connection = mysqli_connect($host, $db_user, $db_password, $database);
            $message = "";
            
            if($connection){
                $message .= "Database connection established.";
                ?>
                <div class="alert alert-info" role="alert">
                <?php
                    echo $message;
                ?>
                </div>
                <?php
                $selectAllQuery = "SELECT * FROM user_details";
                $result = mysqli_query($connection, $selectAllQuery);
                
                
                
                ?>
                <div class="alert alert-success" role="alert">
                <?php
                    while($row = mysqli_fetch_assoc($result)){
                        echo "id : " . $row['id'] . "<br>";
                        echo "username : " . $row['username'] . "<br>";
                        echo "password : " . $row['password'] . "<br>" . "<hr>";
                        }
                ?>
                </div>
                <?php
            }

        ?>        
    </div>

</body>

</html>
