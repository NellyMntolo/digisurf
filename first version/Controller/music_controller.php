<?php
 session_start();
 $music_session = $_GET['music'];

 $_SESSION['music'] = $music_session;

 $the_music = '';
 $the_text = $_SESSION['music'];




  if ($_SESSION['music'] == "Audio On") {
    # code...
    $the_music = "autoplay loop";
  } elseif ($_SESSION['music'] == "Audio Off") {
    # code...
    $the_music = "muted";
  } else {
    $the_music = "autoplay loop";
    $the_text = "Audio On";
  }

 $_SESSION['play'] = $the_music;
 $_SESSION['text'] = $the_text;
 // echo $the_music;
 // echo $the_text;
 header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

