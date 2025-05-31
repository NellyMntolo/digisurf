<?php
   //include '../Model/session.php';
   //mysql_set_charset("utf8");
   session_start();

   //session_unset($_SESSION['login_visitor']); 
   unset($_SESSION['login_visitor']);
   

   if(!isset($_SESSION['login_visitor'])){
      header("Location: /");
      //header('Refresh:0;' . $_SERVER['HTTP_REFERER']);
      //header("Refresh:0; url=/Booking");
      exit;
   } else {
         //session_unset();
         //session_destroy();
      unset($_SESSION['login_visitor']);
      header("Location: /");
      exit;

   }
   unset($_SESSION['login_visitor']);
   header("Location: /"); 
   exit;
   //header('Refresh:0;' . $_SERVER['HTTP_REFERER']);
   //header("Refresh:0; url=/Booking");
   /*if(session_destroy())
   {
      header("Location: /Login");
   }*/
   
?>