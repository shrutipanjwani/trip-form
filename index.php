<?php 
    $insert = false;
    if(isset($_POST['name'])){
        //Set/Define Connection variables
        $server = "localhost";
        $username = "root";
        $password = "";
        //Create a database connection
        $con = mysqli_connect($server, $username, $password);

        //Check for a database connection success
        if (!$con) {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        // echo "Success connecting to the DB";
        //Collect post variables
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
        
        $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        // echo $sql;

        if($con->query($sql) == true) {
            // echo "Successfully Inserted"; 
            $insert = true;
        } else {
            echo "Error: $sql <br> $con->error";
        }
        //Close the database connection
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Registeration Form</title>
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <style>
        <?php include "style.css" ?>
    </style>
</head>
<body>
    <div class="container">
        <div class="left-container">
            <h1><i class="fas fa-plane-departure"></i>&nbsp;Let's Go</h1>
            <div class="trip">
                <img src="images/pic.png" />
            </div>
        </div>
        <div class="right-container">
            <h3>
                Welcome to US Trip Form
            </h3>
            <p>Enter Your Details and submit this form</p>
            <?php 
                if ($insert == true) {
                    echo "<p class='submitMsg'><i class='fas fa-check-circle'></i>&nbsp;Thanks for submitting your form. We're glad to see you being with us.</p>";
                }
            ?>
            <form action="index.php" method="post">

                <label for='name'><i class="fa fa-user"></i>&nbsp;&nbsp;Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your Name" required>

                <label for='age'><i class="fas fa-clock"></i>&nbsp;&nbsp;Age</label>
                <input type="text" id="age" name="age" placeholder="How old are you?" required>

                <label for='gender'><i class="fas fa-venus-mars"></i>&nbsp;&nbsp;Gender</label>
                <input type="text" id="gender" name="gender" placeholder="Enter your gender" required>

                <label for='email'><i class="fas fa-envelope"></i>&nbsp;&nbsp;Email</label>
                <input type="email" name="email" id="email" placeholder="Your official email" required>

                <label for='phone'><i class="fas fa-phone"></i>&nbsp;&nbsp;Phone no.</label>
                <input type="tel" name="phone" id="phone" placeholder="Enter your phone no." required>

                <label for='desc'><i class="fas fa-info"></i>&nbsp;&nbsp;Any other information</label>
                <textarea name="desc" id="desc" cols="20" rows="6" 
                placeholder="Enter any other information here" required></textarea>
                
                <button class="btn">Submit</button>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
    
</body>
</html>