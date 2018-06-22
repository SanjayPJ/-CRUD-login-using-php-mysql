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
                    
                    <form class="pt-3 form-container" action="database_update.php" method="post">
                            <?php 
                                //connecting to database
                                $db_user = "root";
                                $db_password = "";
                                $host = "localhost";
                                $database = "login_details";
                                $connection = mysqli_connect($host, $db_user, $db_password, $database);
                            ?>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">ID</label>
                                <select name="id" class="form-control" id="exampleFormControlSelect1">
                                    <?php
                                        if($connection){
                                            $selectAllQuery = "SELECT * FROM user_details";
                                            $result = mysqli_query($connection, $selectAllQuery);
                                            if($result){
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    $id = $row[id];
                                                    echo "<option value='$id'>$id</option>";
                                                }
                                            }                                            
                                        }

                                    ?>
                                </select>
                              </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                            </div>
                            <?php 
                            
                                if(isset($_POST['submit'])){
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];   
                                    $id = $_POST['id'];
                                    
                                    $queryUpdate = "UPDATE user_details SET username = '$username' , password = '$password' WHERE id = '$id'";
                                    $result = mysqli_query($connection, $queryUpdate);
                                    
                                    if($result){
                                        ?>
                                        <div class="alert alert-success" role="alert">
                                        <?php
                                            echo "Query Updated.";
                                        ?>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?php
                                            echo "Query Update failed.";
                                        ?>
                                        </div>
                                        <?php
                                    }
                                }

                            ?>
                            <button type="submit" class="btn btn-primary w-100" name="submit">Update</button>
			</form>
		</div>
		
	</body>
	
</html>