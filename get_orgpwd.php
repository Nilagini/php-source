<?php
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
    $result = mysqli_query($conn, "SELECT * FROM organization_details"); // Select all rows from donor table
    echo "Getting from DB";

    while($row = mysql_fetch_array($result)){
        echo "inside org details";
        $tmp = array();        // temporary array to create single match information
        $tmp["username"] = $row["username"];
        $tmp["password"] = $row["password"];
        array_push($response["jresponse"], $tmp);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
get_data();
?>
