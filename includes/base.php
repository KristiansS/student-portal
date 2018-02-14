<?php 
session_start();

$dbhost = "localhost";
$dbname = "lilcode_student_portal";
$dbuser = "lilcode";
$dbpass = "Foq9rq4jHuSeWjYW";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
				
// check connection
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
				
$conn->select_db($dbname);
if($result = $conn->query("SELECT DATABASE()")){
	$row = $result->fetch_row();
	//printf("Default database is %s. \n", $row[0]);
	$result->close();
}
$conn->close();


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- braintree -->
    <script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
    $.ajax({
        url: "token.php",
        type: "get",
        dataType: "json",
        success: function(data){
            braintree.setup(data, 'dropin', { container: 'dropin-container'});
        }
    })
    </script>
</head>
</html>