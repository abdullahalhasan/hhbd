<?php
session_start();
$sessionName = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login/login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../login/login.php");
}
?>
<html>
    <head>
        <title>Helping Hand Bangladesh</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </head>
    <body>
     <?php
    
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
        
        /*echo $sessionName;
        die;*/
            
            if ($sessionName == "admin") {
                $sql = "SELECT * FROM app_user_table";
                $result = $conn->query($sql);
            } else if ($sessionName == "dhaka") {
                $sql = "SELECT * FROM `app_user_table` WHERE division = 'Dhaka' AND gender = 'male'";
                $result = $conn->query($sql);
            } else if ($sessionName == "rajshahi") {
                $sql = "SELECT * FROM `app_user_table` WHERE division = 'Rajshahi' AND gender = 'male'";
                $result = $conn->query($sql);
            } else if ($sessionName == "rangpur") {
                $sql = "SELECT * FROM `app_user_table` WHERE division = 'Rangpur' AND gender = 'male'";
                $result = $conn->query($sql);
            } else if ($sessionName == "sylhet") {
                $sql = "SELECT * FROM `app_user_table` WHERE division = 'Sylhet' AND gender = 'male'";
                $result = $conn->query($sql);
            } else if ($sessionName == "khulna") {
                $sql = "SELECT * FROM `app_user_table` WHERE division = 'Khulna' AND gender = 'male'";
                $result = $conn->query($sql);
            } else if ($sessionName == "barishal") {
                $sql = "SELECT * FROM `app_user_table` WHERE division = 'Barishal' AND gender = 'male'";
                $result = $conn->query($sql);
            } else if ($sessionName == "chottogram") {
                $sql = "SELECT * FROM `app_user_table` WHERE division = 'Chottogram' AND gender = 'male'";
                $result = $conn->query($sql);
            }
        
        //echo $sql;
        //$result = $conn->query($sql);
        
        
        
     ?> 
        <nav class="navbar navbar-light bg-light justify-content-between">
          <?php  if (isset($_SESSION['username'])) : ?>
          <a class="navbar-brand">Welcome <strong><?php echo $_SESSION['username']; ?></strong></a>
          <form class="form-inline">
            
            <a class="navbar-brand my-2 my-sm-0" href="../login/logout.php" style="color: red;">LOGOUT</a> 
            <?php endif ?>
          </form>
        </nav>
        <div class="container text-center">
            <h1 class="h1 text-center text-success "><b>Registerd User List</b>
            
        
         </h1>
        </div>
        </br>
        <div class="container-fluid">
         <table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Group</th>
              <th scope="col">Type</th>
              <th scope="col">Age</th>
              <th scope="col">Mobile</th>
              <th scope="col">Last Donate</th>
              <th scope="col">Division</th>
              <th scope="col">Occupation</th>
              <th scope="col">Father's Name</th>
              <th scope="col">Present Address</th>
              <th scope="col">Permanent Address</th>
              <th scope="col">Email / Facebook ID</th>
            </tr>
          </thead>
           <?php
                if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tbody>";
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["bloodGroup"]."</td>";
                echo "<td>".$row["donnerType"]."</td>";
                echo "<td>".$row["age"]."</td>";
                echo "<td>".$row["mobileNumber"]."</td>";
                echo "<td>".$row["lastBloodDonateDate"]."</td>";
                echo "<td>".$row["division"]."</td>";
                echo "<td>".$row["occupation"]."</td>";
                echo "<td>".$row["fatherName"]."</td>";
                echo "<td>".$row["presentAddress"]."</td>";
                echo "<td>".$row["permanentAddress"]."</td>";
                echo "<td>".$row["emailFbID"]."</td>";
                
                }
            } else {
                echo "<h1 class='text-center text-danger'>No Available Data Here!!</h1>";
            }
            
            $conn->close();
             ?>
          <!--<tbody>
            <tr>
              <th><?php echo $row["id"];  ?></th>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["gender"]; ?></td>
              <td><?php echo $row["bloodGroup"]; ?></td>
              <td><?php echo $row["donnerType"]; ?></td>
              <td><?php echo $row["age"]; ?></td>
              <td><?php echo $row["mobileNumbr"]; ?></td>
              <td><?php echo $row["lastBloodDonateDate"]; ?></td>
              <td><?php echo $row["division"]; ?></td>
              <td><?php echo $row["occupation"]; ?></td>
              <td><?php echo $row["fatherName"]; ?></td>
              <td><?php echo $row["presentAddress"]; ?></td>
              <td><?php echo $row["permanentAddress"]; ?></td>
              <td><?php echo $row["emailFbID"]; ?></td>
            </tr>
          </tbody>-->
         </table>
       
         <?php
         ?>
        </div> 
    </body>
</html>