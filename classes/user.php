<?php
require_once "database.php";
//include specified file in the current file

//include thie - send a warning if not found
//include_once - if it detect a previous INCLUDE, not include anymore

//require - give error, stop the script if not found
//require_once - if it detects a previous REQUIRE of the same file, not include anymore

class User extends Database{
    public function login($username, $password){
        $error = "The username or password you entered is incorrect.";
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        if($result->num_rows == 1){
            $user_details = $result->fetch_assoc();
            if(password_verify($password,$user_details['password'])){
                session_start();

                $_SESSION['id'] = $user_details['id'];
                $_SESSION['username'] = $user_details['username'];

                header("location: ../views/dashboard.php");
                exit;
            }else{
                echo $error;
            }
        }else{
            echo $error;
        }
    }

    public function createUser($first_name,$last_name,$username,$password,$origin){
        $sql = "INSERT INTO users(first_name,last_name,username,`password`) VALUES ('$first_name','$last_name','$username','$password')";
        
        if($this->conn->query($sql)){
            if($origin == "register"){
                header("location: ../views"); // go to index.php/login page
                exit;        
            }elseif($origin == "dashboard"){
                header("location: ../views/dashboard.php");
                exit;        
            }
        }else{
            die("Error creating user: ".$this->conn->error);
        }
    }

    public function getUsers(){
        $sql = "SELECT id, first_name, last_name, username FROM users";
    
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving users: ".$this->conn->error);
        }
    }

    public function getUser($user_id){
        $sql = "SELECT id, first_name, last_name, username FROM users WHERE id = $user_id";
        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
            // use fetch_assoc() since we're expercting one row only.
            // return an associative array
        }else{
            die("Error retrieving user: ".$this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name, $last_name, $username){
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id";
        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: ".$this->conn->error);
        }
    }

    public function deleteUser($user_id){
        $sql = "DELETE FROM users WHERE id = $user_id";
        
        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: ".$this->conn->error);
        }

    }

}
