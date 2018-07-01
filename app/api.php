
 <?php

    $data = file_get_contents("php://input"); 
    //echo $data; -> //{ 'user':{'email':'1234','password':'1234'}};
    $decode = json_decode($data,true);
    
    $name = $decode['user']['name'];
    $gender = $decode['user']['gender'];
    $bloodGroup = $decode['user']['bloodGroup'];
    $donnerType = $decode['user']['donnerType'];
    $age = $decode['user']['age'];
    $mobileNumber = $decode['user']['mobileNumber'];
    $lastBloodDonateDate = $decode['user']['lastBloodDonateDate'];
    $division = $decode['user']['division'];
    $occupation = $decode['user']['occupation'];
    $fatherName = $decode['user']['fatherName'];
    $presentAddress = $decode['user']['presentAddress'];
    $permanentAddress = $decode['user']['permanentAddress'];
    $emaliFbID = $decode['user']['emailFbID'];
    
    
    //Database Credentials
    $servername = "localhost";
    $username = "helpinghandbd_app";
    $password = "Demopass000";
    $dbname = "helpinghandbd_app";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    //$data = file_get_contents("php://input"); 
    //{ 'user':{'email':'1234','password':'1234'}};
    
    
    
    $sql = "INSERT INTO app_user_table (id,name,gender,bloodGroup,donnerType,age,mobileNumber,lastBloodDonateDate,division,occupation,fatherName,presentAddress,permanentAddress,emailFbID)
    VALUES (null, '$name', '$gender','$bloodGroup','$donnerType','$age','$mobileNumber','$lastBloodDonateDate','$division','$occupation','$fatherName','$presentAddress','$permanentAddress','$emaliFbID')";
    
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        $response= [
                    "statusCode"=> 200,
                    "successMessage"=> "Data inserted successfully",
                    "mobileNumber"=> $mobileNumber,
                ];
        echo json_encode($response);
    } else {
        $response= [
                    "statusCode"=> 300,
                    "successMessage"=> "Data inserted failed!"
                ];
        echo json_encode($response);
    }
   
   $conn->close();
?> 