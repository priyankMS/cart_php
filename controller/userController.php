<?php
include_once "../config/database.php";
include_once "../models/userModel.php";
session_start();


class AuthController {
    private $user;

    public function __construct(){
        $database = new Database();
        $db = $database->getConnection();
        $this->user = new User($db);
    }

    public function register($firs_name,$last_name, $email,$gender, $password){
      //checkk email
      $emailExist = $this->user->findByEmail($email);
      if($emailExist){
        return array("message" => "Email already exist");
      }

      //password hash
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);

      //save user into db
      if($this->user->create($firs_name,$last_name,$email,$gender,$passwordHash)){
        header("Location:../view/auth/login.php");
      }else{
        echo "register failed";
      }
    }

       public function login($email, $password) {
        $user = $this->user->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../dashboard.php");
        } else {
            echo "Invalid credentials!";
        }
    }

}




?>
