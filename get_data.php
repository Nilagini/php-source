<?php
include_once './DbConnect1.php';
function get_data(){
    $db = new DbConnect();
    // array for json response of full fixture
    $response = array();
    $response["jresponse"] = array();
    $result = mysql_query("SELECT * FROM donor_details"); // Select all rows from donor table
    while($row = mysql_fetch_array($result)){
        $tmp = array();        // temporary array to create single match information
        $tmp["blood_group"] = $row["Blood_group"];
        $tmp["location"] = $row["Location"];
        $tmp["status"] = $row["Available"]; 
		$tmp["username"] = $row["name"]; 
		$tmp["contact"] = $row["Contact_number"]; 
        array_push($response["jresponse"], $tmp);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
get_data();
?>