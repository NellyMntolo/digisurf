<?php
$username="root";
$password="123456";
$database="digisurf";

// Start XML file, create parent node

$dom = new DOMDocument("1.0", "utf-8");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table

$query = "SELECT * FROM digisurf_stores";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("store_id",$row['store_id']);
  $newnode->setAttribute("store_name",$row['store_name']);
  $newnode->setAttribute("store_address", $row['store_address']);
  $newnode->setAttribute("store_lat", $row['store_lat']);
  $newnode->setAttribute("store_lng", $row['store_lng']);
  $newnode->setAttribute("store_type", $row['store_type']);
}

// echo $dom->saveXML();
echo utf8_encode($dom->saveXML());


?>