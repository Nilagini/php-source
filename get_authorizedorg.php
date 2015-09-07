<?php
include_once './DbConnect1.php';
function get_data(){
    $db = new DbConnect();
    // array for json response of full fixture
    $response = array();
    $response["jresponse"] = array();
    $result = mysql_query("SELECT * FROM authorized_org"); // Select all rows from authorized_org table
    while($row = mysql_fetch_array($result)){
        $tmp = array();        // temporary array to create single match information
        $tmp["org_name"] = $row["org_name"];
        $tmp["location"] = $row["location"];
        array_push($response["jresponse"], $tmp);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
get_data();
?>