<?php
function createNewPrediction() {
    define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
    define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
    define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or
            die("Error: Couldn't connect" .DB_HOST.DB_USER.DB_PASS.DB_PORT. DB_NAME.mysqli_error($mysqlCon));

    $response = array();
    $contact = $_POST["contactnumber"];
    $mail_id = $_POST["email_id"];
    $code = $_POST["organizationbbcode"];
    $org_name = $_POST["organization_name"];
    $password = $_POST["password"];
    $username = $_POST["username"];

    $sql = "INSERT INTO organization_details(contactnumber,email_id,organizationbbcode,organization_name,password,username) VALUES('$contact','$mail_id','$code','$org_name','$password','$username')";
    $result = $conn->query($sql);

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
