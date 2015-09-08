<?php
include_once './DbConnect1.php';
function get_data(){
    define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
    define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
    define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or
            die("Error: Couldn't connect" .DB_HOST.DB_USER.DB_PASS.DB_PORT. DB_NAME.mysqli_error($mysqlCon));

    // array for json response of full fixture
    $response = array();
    $response["jresponse"] = array();

    $sql="SELECT * FROM donor_details";
    echo "Getting from DB";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["blood_group"]. " - Name: " . $row["location"]. " " . $row["username"]. "<br>";
            $tmp = array();        // temporary array to create single match information
            $tmp["blood_group"] = $row["Blood_group"];
            $tmp["location"] = $row["Location"];
            $tmp["status"] = $row["Available"];
            $tmp["username"] = $row["name"];
            $tmp["contact"] = $row["Contact_number"];
            array_push($response["jresponse"], $tmp);
        }
    } else {
        echo "0 results";
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    return json_encode($response);
    $conn->close();
}
get_data();
?>
