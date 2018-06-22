<?php
    function connectDB($host, $user, $password, $database){
        global $connection;
        $connection = mysqli_connect($host, $user, $password, $database);        
    }
    
    function createDB($username,$password){
        global $connection , $message;
        $message .= "Database connection established."  . "<br>";

        $addQuery = "INSERT INTO user_details(username, password) VALUES ('$username', '$password')";

        $result = mysqli_query($connection , $addQuery);

        if($result){

            $message .= "Query added."  . "<br>";

        }else{

            $message .= "Query adding failed." . "<br>";

        }

        ?>

        <div class="alert alert-info" role="alert">

        <?php

            echo $message;

        ?>

        </div>

        <?php
    }
    
    function readDB(){
        global $message,$connection;
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
    function updateDB($username,$password,$id){
        global $message , $connection;
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
    function deleteDB($id){
        global $connection , $message;
        $queryDelete = "DELETE FROM user_details WHERE id = '$id'";
        $result = mysqli_query($connection, $queryDelete);

        if($result){
            ?>
            <div class="alert alert-success" role="alert">
            <?php
                echo "Query deleted.";
            ?>
            </div>
            <?php
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
            <?php
                echo "Query delete failed.";
            ?>
            </div>
            <?php
        }
    }