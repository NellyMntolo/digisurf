<?php
   include '../Model/session.php';
   mysql_set_charset("utf8");
   session_start();

   //session_unset($_SESSION['login_visitor']); 
   unset($_SESSION['login_visitor']);
   

   if(!isset($_SESSION['login_visitor'])){
      header("location:/Login");
   }
   
   header("Location: /Login"); 
   /*if(session_destroy())
   {
      header("Location: /Login");
   }*/
   
?>