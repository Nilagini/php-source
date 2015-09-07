<?php
include_once './DbConnect1.php';
function createNewPrediction() {
         $response = array();
        $contact = $_POST["contactnumber"];
        $mail_id = $_POST["email_id"];
        $code = $_POST["organizationbbcode"];
		$org_name = $_POST["organization_name"];
		$password = $_POST["password"];
		$username = $_POST["username"];
                $db = new DbConnect();
       // mysql query
        $query = "INSERT INTO organization_details(contactnumber,email_id,organizationbbcode,organization_name,password,username) VALUES('$contact','$mail_id','$code','$org_name','$password','$username')";
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