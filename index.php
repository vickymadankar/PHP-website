<?php
$insert =false;
if(isset($_POST['name'])){
    $server= "localhost";
    $username= "root";
    $password= "";

    $con= mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    //  echo"success connecting to the db";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `travel`.`travel` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', '2021-04-06 03:34:11.000000');";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "successfully inserted";
        $insert = true;
    }
    else{
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Page</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <img class="bg" src="bg.jpg" alt="My travel">
    <div class="container">
    <h1>Welcome to My travel Page</h1>
    <p>Enter your details here to confirm your participation in the tour.</p>
    <?php
    if($insert =true){
    echo "<p class='submitMsg'>Thanks for submitting your form.we are happy to see you joining with us for the Tour.</p>";}
    ?>
   <form action="index.php" method="post">
      <input type="text" name="name" id="name" placeholder="Enter your name">
      <input type="text" name="age" id="age" placeholder="Enter your age">
      <input type="text" name="gender" id="gender" placeholder="Enter your gender">
      <input type="email" name="email" id="email" placeholder="Enter your email">
      <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
      <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
      <button class="btn">Submit</button>

   </form>

  </div>
    <script src="index.js"></script>
    
</body>
</html>