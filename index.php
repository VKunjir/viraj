<?php
$insert = false ;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root" ;
    $password = "" ;

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to ". mysqli_connect_error());
    }
    //echo "Successfully connected to database ";

    $name = $_POST['name']; 
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());" ;
    //echo $sql ;

    if($con->query($sql) == true){
        //echo "Successfully inserted ";
        $insert = true ;
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Welcome to Travel From</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="VIIT Pune">
    <div class="container">
        <h1>
            Welcome to VIIT Pune US trip From
        </h1>
        <p>Enter your detials and submit this from to confirm your participation in the trip</p>
        <?php
        if($insert == true)
        {
           echo "<p class='submitMSG'>Thank for submitting your form. We are happy to see you joining us for US trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name"name placeholder="Enter your name ">
            <input type="text" name="age" id="age"name placeholder="Enter your age ">
            <input type="text" name="gender" id="gender"name placeholder="Enter your gender ">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone"name placeholder="Enter your phone number ">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any another info here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>