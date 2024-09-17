<?php
  //session manegement
  session_start();

  //function 
  function checkSession(){
      if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
        exit;
    }
    function sessionDestroy(){
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
  }
?>