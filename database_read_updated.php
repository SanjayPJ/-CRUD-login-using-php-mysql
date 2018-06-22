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
            include 'db.php';
            $host = "localhost";
            $db_user = "root";
            $db_password = "";
            $database = "login_details";
            connectDB($host, $db_user, $db_password, $database);
            $message = "";
            
            if($connection){
                readDB();
            }

        ?>        
    </div>

</body>

</html>
