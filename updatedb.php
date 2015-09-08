<?php
function createNewPrediction() {

    define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
    define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
    define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or
            die("Error: Couldn't connect" .DB_HOST.DB_USER.DB_PASS.DB_PORT. DB_NAME.mysqli_error($mysqlCon));

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
    $sql ="UPDATE Donor_details
                SET Blood_group=$bloodgroup,Location=$location,Available=$available,name=$username WHERE Contact_number=$contact";

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
