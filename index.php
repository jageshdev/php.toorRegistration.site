<?php
$insert = false;
if(isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "IES_trip"; // Added database name

    $con = mysqli_connect($server, $username, $password, $database); // Added database parameter

    if(!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phon = $_POST['phon'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `IES_trip` (`name`, `age`, `gender`, `phon`, `email`, `desc`, `date`)
            VALUES ('$name', '$age', '$gender', '$phon', '$email', '$desc', current_timestamp())";

    if($con->query($sql) === true) { // Corrected the comparison operator
        //echo "Successfully inserted";
        $insert = true;
    } else {
        echo "ERROR: $sql <br>" . $con->error;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="DSC_3830.JPG" alt="IES">
    <div class="container">
        <h1>Welcome to IES Bhopal trip form</h1>
        <p>Enter your detail and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true) { // Corrected the comparison operator
            echo "<p class='msg'>Thank you <br> your form is submitted. Welcome on the trip</p>";
        }
        ?>
        <form action="index.php" method="POST"> <!-- Corrected the action attribute value -->
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your Age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="text" name="phon" id="phon" placeholder="enter your Phon no">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <textarea name="desc" id="desc" cols="10" rows="5" placeholder="enter your Query"></textarea>
            <button type="submit" class="btn">submit</button>
        </form>
    </div>
    <script src=""></script>
</body>
</html>
