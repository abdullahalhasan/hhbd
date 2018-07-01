<?php

/*
* Database Constants
* Make sure you are putting the values according to your database here
*/
define('DB_HOST','localhost');
define('DB_USERNAME','helpinghandbd_app');
define('DB_PASSWORD','Demopass000');
define('DB_NAME', 'helpinghandbd_app');

//Connecting to the database
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

//checking the successful connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//making an array to store the response
$response = array();


//if there is a post request move ahead
if($_SERVER['REQUEST_METHOD']=='POST'){

    //getting the name from request
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $bloodGroup = $_POST['bloodGroup'];
    $donnerType = $_POST['donnerType'];
    $age = $_POST['age'];
    $mobileNumber = $_POST['mobileNumber'];
    $lastBloodDonateDate = $_POST['lastBloodDonateDate'];
    $division = $_POST['division'];
    $occupation = $_POST['occupation'];
    $fatherName = $_POST['fatherName'];
    $presentAddress = $_POST['presentAddress'];
    $permanentAddress = $_POST['permanentAddress'];
    $emailFbID = $_POST['emailFbID'];
    $status = $_POST['status'];

    //creating a statement to insert to database
    $stmt = $conn->prepare("INSERT INTO app_user_table (name,gender,bloodgroup,donnerType,age,mobileNumber,lastBloodDonateDate,division,
        occupation,fatherName,presentAddress,emailFbID,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    /*//binding the parameter to statement
    $stmt->bind_param("s1", $name);
    $stmt->bind_param("s2", $gender);
    $stmt->bind_param("s3", $bloodGroup);
    $stmt->bind_param("s14", $donnerType);
    $stmt->bind_param("s4", $age);
    $stmt->bind_param("s5", $mobileNumber);
    $stmt->bind_param("s6", $lastBloodDonateDate);
    $stmt->bind_param("s7", $division);
    $stmt->bind_param("s8", $occupation);
    $stmt->bind_param("s9", $fatherName);
    $stmt->bind_param("s10", $presentAddress);
    $stmt->bind_param("s11", $permanentAddress);
    $stmt->bind_param("s12", $emailFbID);
    $stmt->bind_param("s13", $status);*/
    

    //if data inserts suc$cessfully
    if($stmt->execute()){
        //making success response
        $response['error'] = false;
        $response['message'] = 'Name saved successfully';
    }else{
        //if not making failure response
        
        $response['error'] = true;
        $response['message'] = 'Please try later';
    }

}else{
    $response['error'] = true;
    $response['message'] = $response['error'];
}

//displaying the data in json format
echo json_encode($response);