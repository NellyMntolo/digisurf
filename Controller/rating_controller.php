<?php  
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

if(!isset($_SESSION['login_visitor'])){
    header("location: /Booking"); 
      exit;
} else {
$current_user = $_SESSION['login_visitor'];

$tt_guid = $_POST['tt_guid'];
$ct_guid = $_POST['ct_guid'];
$teacher_guid = $_POST['teacher_guid'];
$score = $_POST['score']; //array
//$content = $_POST['content'];
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
$theGuid = strtoupper(gen_uuid());

                if(!empty($current_user)){

                    if($_POST['content'] != ''){
                        $sqla = 'INSERT INTO teachers_score (guid, tt_guid, ct_guid, teacher_guid, created_at, score, content) VALUES ( "'.$theGuid.'", "'.$tt_guid.'", "'.$ct_guid.'", "'.$teacher_guid.'",  now(), "'.$score.'","'.$_POST['content'].'")';
                        $retvala = mysql_query( $sqla, $conn );
                        if(! $retvala ) {  
                            die('Could not enter data: ' . mysql_error());
                          }
                    } else {
                    $sqla = 'INSERT INTO teachers_score (guid, tt_guid, ct_guid, teacher_guid, created_at, score) VALUES ( "'.$theGuid.'", "'.$tt_guid.'", "'.$ct_guid.'", "'.$teacher_guid.'",  now(), "'.$score.'")';
                      $retvala = mysql_query( $sqla, $conn );
                        if(! $retvala ) {  
                            die('Could not enter data: ' . mysql_error());
                          }
                    }


                    }

            }//else   
?>