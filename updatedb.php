<?php
include_once './DbConnect.php';
function createNewPrediction() {
         $response = array();
        $bloodgroup = $_POST["Blood_group"];
        $location = $_POST["Location"];
        $available = $_POST["Available"];
		$username = $_POST["name"];
		$contact = $_POST["Contact_number"];
		$nic = $_POST["Contact_number"];
		$age = $_POST["Contact_number"];
                $db = new DbConnect();
       // mysql query
        $query ="UPDATE Donor_details
SET Blood_group=$bloodgroup,Location=$location,Available=$available,name=$username WHERE Contact_number=$contact";
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