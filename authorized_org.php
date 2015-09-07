<?php
include_once './DbConnect1.php';
function createNewPrediction() {
         $response = array();
        $org_name = $_POST["org_name"];
        $location= $_POST["location"];
        
                $db = new DbConnect();
       // mysql query
        $query = "INSERT INTO authorized_org(org_name,location) VALUES('$org_name','$location')";
        $result = mysql_query($query) or die(mysql_error());
        if ($result) {
            $response["error"] = false;
            $response["message"] = "Prediction added successfully!";
        } else {
            $response["error"] = true;
            $response["message"] = "Failed to add donor_details!";
        }
       // echo json response
    echo json_encode($response);
}
createNewPrediction();
?>