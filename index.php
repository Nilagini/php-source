<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
echo '<p>-----------Hello World</p>'; 
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME', getenv('OPENSHIFT_APP_NAME'));

$mysqlCon = mysqli_connect(DB_HOST, DB_USER, DB_PASS, "", DB_PORT) or die("Error: " . mysqli_error($mysqlCon));
mysqli_select_db($mysqlCon, DB_NAME) or die("Error: " . mysqli_error($mysqlCon));


?> 
 </body>
</html>
