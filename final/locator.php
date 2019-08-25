<?php
require("conn.php");
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a mySQLi server

// Search the rows in the markers table
$query = sprintf("SELECT id, branch_name, address, contact, openning_hour, closed_hour, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM tbl_branches HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($conn, $center_lat),
  mysqli_real_escape_string($conn, $center_lng),
  mysqli_real_escape_string($conn, $center_lat),
  mysqli_real_escape_string($conn, $radius));
$result = mysqli_query($conn, $query);
$result = mysqli_query($conn, $query);
if (!$result) {
  die("Invalid query: " . mysqli_error());
}
header("Content-type: text/xml");
// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  $id=$row['id'];
  $distances =  $row['distance']; 

  $sql = "SELECT * FROM tbl_charges_rate WHERE branch_id='$id' AND (distance_from<='$distances' AND distance_to>'$distances')";
  $results = $conn->query($sql);
  $fee = "";

  if ($results->num_rows > 0) {
      // output data of each row
      while($rows = $results->fetch_assoc()) {
          $fee = $fee . $rows["price"];
      }
  }

  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['id']);
  $newnode->setAttribute("branch_name", $row['branch_name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("contact", $row['contact']);
  $newnode->setAttribute("fee", $fee);
  $newnode->setAttribute("openning_hour", $row['openning_hour']);
  $newnode->setAttribute("closed_hour", $row['closed_hour']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("distance", $row['distance']);
}
echo $dom->saveXML();
?>