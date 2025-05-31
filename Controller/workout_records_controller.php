<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
// session_start();
error_reporting(0);
ini_set("allow_url_fopen", true);


// if(isset($_GET['pushContentType']) == 1){
// 	echo $_GET['pushContentType'].' method : GET';
// $userUuid = $_GET['pushContentType'];
// $accessToken = $_GET['accessToken'];
// $oauthUserExercisePushRecordId = '';
// $effectTime = '';
// $endTime = '';
// $calorie = '';
// $startTime = '';
// $startTimeLong = '';
// $endTimeLong = '';
// $duration = '';
// $exerciseClassId = '';
// $timeZone = '';
// $latitude = '';
// $longitude = '';
// $isQualify333150 = '';
// $isMeetLeastEffectTime = '';
// $failReason333150 = '';
// $uploadTime = '';
// $avgHR = '';
// $effectCalorie = '';
// $velocity = '';
// $zone3HRRatio = '';
// $maxHR = '';
// $zone2HRRatio = '';
// $zone25HRRatio = '';
// $zone4HRRatio = '';
// $zone1HRRatio = '';
// $isUseHRDevice = '';
// $zone2LowerBound = '';
// $zone25LowerBound = '';
// $zone3LowerBound = '';
// $zone4LowerBound = '';
// $distance = '';
// $isDataFromHRDevice = '';
// $validHRTime = '';
// $isValid = '';
// $invalidReason = '';

// 	$sqla = 'INSERT INTO user_sports_record_copy (userUuid, accessToken, oauthUserExercisePushRecordId, effectTime, endTime, calorie, startTime, startTimeLong, endTimeLong, duration, exerciseClassId, timeZone, latitude, longitude, isQualify333150, isMeetLeastEffectTime, failReason333150, uploadTime, avgHR, effectCalorie, velocity, zone3HRRatio, maxHR, zone2HRRatio, zone25HRRatio, zone4HRRatio, zone1HRRatio, isUseHRDevice, zone2LowerBound, zone25LowerBound, zone3LowerBound, zone4LowerBound, distance, isDataFromHRDevice, validHRTime, isValid, invalidReason, created_at) VALUES (  "'.$userUuid.'", "'.$accessToken.'", "'.$oauthUserExercisePushRecordId.'", "'.$effectTime.'", "'.$endTime.'", "'.$calorie.'", "'.$startTime.'", "'.$startTimeLong.'", "'.$endTimeLong.'", "'.$duration.'", "'.$exerciseClassId.'", "'.$timeZone.'", "'.$latitude.'", "'.$longitude.'", "'.$isQualify333150.'", "'.$isMeetLeastEffectTime.'", "'.$failReason333150.'", "'.$uploadTime.'", "'.$avgHR.'", "'.$effectCalorie.'", "'.$velocity.'", "'.$zone3HRRatio.'", "'.$maxHR.'", "'.$zone2HRRatio.'", "'.$zone25HRRatio.'", "'.$zone4HRRatio.'", "'.$zone1HRRatio.'", "'.$isUseHRDevice.'", "'.$zone2LowerBound.'", "'.$zone25LowerBound.'", "'.$zone3LowerBound.'", "'.$zone4LowerBound.'", "'.$distance.'", "'.$isDataFromHRDevice.'", "'.$validHRTime.'", "'.$isValid.'", "'.$invalidReason.'", NOW())';

//   $retvala = mysql_query( $sqla, $conn );
//     if(! $retvala ) {  
//         die('Could not enter data: ' . mysql_error());
//       }
// //echo $sqla;

// } 
// else

// $postdata = file_get_contents("php://input");
// // Set the limit to 5 MB.
// $fiveMBs = 5 * 1024 * 1024;
// $fp = fopen("php://temp/maxmemory:$fiveMBs", 'r+');

// fputs($fp, "hello\n");

// // Read what we have written.
// rewind($fp);
// echo stream_get_contents($fp);

// 	if(isset($_POST['pushContentType']) == 1){
// 	echo $_POST['pushContentType'].' method : POST';
// $userUuid = $_POST['pushContentType'];
// $accessToken = '';
// $oauthUserExercisePushRecordId = '';
// $effectTime = '';
// $endTime = '';
// $calorie = '';
// $startTime = '';
// $startTimeLong = '';
// $endTimeLong = '';
// $duration = '';
// $exerciseClassId = '';
// $timeZone = '';
// $latitude = '';
// $longitude = '';
// $isQualify333150 = '';
// $isMeetLeastEffectTime = '';
// $failReason333150 = '';
// $uploadTime = '';
// $avgHR = '';
// $effectCalorie = '';
// $velocity = '';
// $zone3HRRatio = '';
// $maxHR = '';
// $zone2HRRatio = '';
// $zone25HRRatio = '';
// $zone4HRRatio = '';
// $zone1HRRatio = '';
// $isUseHRDevice = '';
// $zone2LowerBound = '';
// $zone25LowerBound = '';
// $zone3LowerBound = '';
// $zone4LowerBound = '';
// $distance = '';
// $isDataFromHRDevice = '';
// $validHRTime = '';
// $isValid = '';
// $invalidReason = '';

// 	$sqla = 'INSERT INTO user_sports_record_copy (userUuid, accessToken, oauthUserExercisePushRecordId, effectTime, endTime, calorie, startTime, startTimeLong, endTimeLong, duration, exerciseClassId, timeZone, latitude, longitude, isQualify333150, isMeetLeastEffectTime, failReason333150, uploadTime, avgHR, effectCalorie, velocity, zone3HRRatio, maxHR, zone2HRRatio, zone25HRRatio, zone4HRRatio, zone1HRRatio, isUseHRDevice, zone2LowerBound, zone25LowerBound, zone3LowerBound, zone4LowerBound, distance, isDataFromHRDevice, validHRTime, isValid, invalidReason, created_at) VALUES (  "'.$userUuid.'", "'.$accessToken.'", "'.$oauthUserExercisePushRecordId.'", "'.$effectTime.'", "'.$endTime.'", "'.$calorie.'", "'.$startTime.'", "'.$startTimeLong.'", "'.$endTimeLong.'", "'.$duration.'", "'.$exerciseClassId.'", "'.$timeZone.'", "'.$latitude.'", "'.$longitude.'", "'.$isQualify333150.'", "'.$isMeetLeastEffectTime.'", "'.$failReason333150.'", "'.$uploadTime.'", "'.$avgHR.'", "'.$effectCalorie.'", "'.$velocity.'", "'.$zone3HRRatio.'", "'.$maxHR.'", "'.$zone2HRRatio.'", "'.$zone25HRRatio.'", "'.$zone4HRRatio.'", "'.$zone1HRRatio.'", "'.$isUseHRDevice.'", "'.$zone2LowerBound.'", "'.$zone25LowerBound.'", "'.$zone3LowerBound.'", "'.$zone4LowerBound.'", "'.$distance.'", "'.$isDataFromHRDevice.'", "'.$validHRTime.'", "'.$isValid.'", "'.$invalidReason.'", NOW())';

//   $retvala = mysql_query( $sqla, $conn );
//     if(! $retvala ) {  
//         die('Could not enter data: ' . mysql_error());
//       }
// }

// function retrieveJsonPostData()
//   {
    // get the raw POST data
    //$rawData = file_get_contents("php://input");

    // this returns null if not valid json
    //return json_decode($rawData);
    //echo json_decode($rawData);
  // }


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
//header('Access-Control-Max-Age: 86400');
//
//'allowedHeaders' => ['Origin', 'X-Requested-With', 'Content-Type', 'Accept']

//BODY PROFILE
//$url = 'https://joiisports20-api.joiiup.com/joiihealth/oauth/getUserProfileList';
// $user_profile_url = 'https://joiisports20-api.joiiup.com/joiihealth/oauth/getUserProfileList?clientId=2h27b240-5593-11e7-9598-0800200c9a66';
// $user_profile_data = array('clientId' => '2h27b240-5593-11e7-9598-0800200c9a66');

// use key 'http' even if you send the request to https://...
// $user_profile_options = array(
//     'http' => array(
//         'header'  => "Content-type: X-Requested-With\r\n",
//         'method'  => 'POST',
//         'content' => http_build_query($user_profile_data)
//     )
// );
// $user_profile_context  = stream_context_create($user_profile_options);
// $user_profile_result = file_get_contents($user_profile_url, false, $user_profile_context);
//$yummy = array();
$user_profile_result = file_get_contents("php://input");
if ($user_profile_result === FALSE) { /* Handle error */ echo "false request";}

//echo $user_profile_result;

//echo $user_profile_result->content[0]->{"userUuid"};
//print_r(json_decode($user_profile_result));
//print_r($user_profile_result->pushContentType[0]);
$yummy = json_decode($user_profile_result);
//echo $_POST[0];
//print_r($yummy);

// if(!is_array($yummy)){
//     echo 'Received content contained invalid JSON!';
// }

// if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["CONTENT_TYPE"] == "application/json")
// {
//   $data = file_get_contents("php://input", false, stream_context_get_default(), 0, $_SERVER["CONTENT_LENGTH"]);
//   global $_POST_JSON;
//   $_POST_JSON = json_decode($data,true);

//   // merge JSON-Content to $_REQUEST 
//   if(is_array($_POST_JSON)) $_REQUEST = $_POST_JSON+$_REQUEST;
//   print_r($_POST_JSON);
//   var_dump($_POST_JSON["data"]);
// }

//echo $_POST['data'];


//echo $yummy->content[0]->{"userUuid"}.'<br>'; // working
//if($yummy->pushContentType == 1){


for ($i=0; $i < count($yummy->content); $i++) { 
//$yummy->content[0]->{"userUuid"};
	//echo "content type: ".$yummy->pushContentType;
$pushContentType = $yummy->pushContentType;
$userUuid = $yummy->content[$i]->{"userUuid"};
$accessToken = $yummy->content[$i]->{"accessToken"};
$oauthUserExercisePushRecordId = $yummy->content[$i]->{"oauthUserExercisePushRecordId"};
$effectTime = $yummy->content[$i]->{"effectTime"};
$endTime = $yummy->content[$i]->{"endTime"};
$calorie = $yummy->content[$i]->{"calorie"};
$startTime = $yummy->content[$i]->{"startTime"};
$startTimeLong = $yummy->content[$i]->{"startTimeLong"};
$endTimeLong = $yummy->content[$i]->{"endTimeLong"};
$duration = $yummy->content[$i]->{"duration"};
$exerciseClassId = $yummy->content[$i]->{"exerciseClassId"};
$timeZone = $yummy->content[$i]->{"timeZone"};
$latitude = $yummy->content[$i]->{"latitude"};
$longitude = $yummy->content[$i]->{"longitude"};
$isQualify333150 = $yummy->content[$i]->{"isQualify333150"};
$isMeetLeastEffectTime = $yummy->content[$i]->{"isMeetLeastEffectTime"};
$failReason333150 = $yummy->content[$i]->{"failReason333150"};
$uploadTime = $yummy->content[$i]->{"uploadTime"};
$avgHR = $yummy->content[$i]->{"avgHR"};
$effectCalorie = $yummy->content[$i]->{"effectCalorie"};
$velocity = $yummy->content[$i]->{"velocity"};
$zone3HRRatio = $yummy->content[$i]->{"zone3HRRatio"};
$maxHR = $yummy->content[$i]->{"maxHR"};
$zone2HRRatio = $yummy->content[$i]->{"zone2HRRatio"};
$zone25HRRatio = $yummy->content[$i]->{"zone25HRRatio"};
$zone4HRRatio = $yummy->content[$i]->{"zone4HRRatio"};
$zone1HRRatio = $yummy->content[$i]->{"zone1HRRatio"};
$isUseHRDevice = $yummy->content[$i]->{"isUseHRDevice"};
$zone2LowerBound = $yummy->content[$i]->{"zone2LowerBound"};
$zone25LowerBound = $yummy->content[$i]->{"zone25LowerBound"};
$zone3LowerBound = $yummy->content[$i]->{"zone3LowerBound"};
$zone4LowerBound = $yummy->content[$i]->{"zone4LowerBound"};
$distance = $yummy->content[$i]->{"distance"};
$isDataFromHRDevice = $yummy->content[$i]->{"isDataFromHRDevice"};
$validHRTime = $yummy->content[$i]->{"validHRTime"};
$isValid = $yummy->content[$i]->{"isValid"};
$invalidReason = $yummy->content[$i]->{"invalidReason"};
$minHR = $yummy->content[$i]->{"minHR"};

	$sqla = 'INSERT INTO user_sports_record (pushContentType, userUuid, accessToken, oauthUserExercisePushRecordId, effectTime, endTime, calorie, startTime, startTimeLong, endTimeLong, duration, exerciseClassId, timeZone, latitude, longitude, isQualify333150, isMeetLeastEffectTime, failReason333150, uploadTime, avgHR, effectCalorie, velocity, zone3HRRatio, maxHR, zone2HRRatio, zone25HRRatio, zone4HRRatio, zone1HRRatio, isUseHRDevice, zone2LowerBound, zone25LowerBound, zone3LowerBound, zone4LowerBound, distance, isDataFromHRDevice, validHRTime, isValid, invalidReason, created_at, minHR) VALUES ("'.$pushContentType.'",  "'.$userUuid.'", "'.$accessToken.'", "'.$oauthUserExercisePushRecordId.'", "'.$effectTime.'", "'.$endTime.'", "'.$calorie.'", "'.$startTime.'", "'.$startTimeLong.'", "'.$endTimeLong.'", "'.$duration.'", "'.$exerciseClassId.'", "'.$timeZone.'", "'.$latitude.'", "'.$longitude.'", "'.$isQualify333150.'", "'.$isMeetLeastEffectTime.'", "'.$failReason333150.'", "'.$uploadTime.'", "'.$avgHR.'", "'.$effectCalorie.'", "'.$velocity.'", "'.$zone3HRRatio.'", "'.$maxHR.'", "'.$zone2HRRatio.'", "'.$zone25HRRatio.'", "'.$zone4HRRatio.'", "'.$zone1HRRatio.'", "'.$isUseHRDevice.'", "'.$zone2LowerBound.'", "'.$zone25LowerBound.'", "'.$zone3LowerBound.'", "'.$zone4LowerBound.'", "'.$distance.'", "'.$isDataFromHRDevice.'", "'.$validHRTime.'", "'.$isValid.'", "'.$invalidReason.'", NOW(), "'.$minHR.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }


      echo "Total Records: ".count($yummy->content)."<br>";

      print_r($yummy);

    } //for loop
 //} elseif($yummy->pushContentType == 2){


 //}


?>


