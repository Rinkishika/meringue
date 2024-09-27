<?php 
include 'conn.php';

$id = $_GET['updateId'];
$sql = "SELECT * FROM `crud` WHERE crud_id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$address = $row['address'];


if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql =  "UPDATE `crud` SET crud_id = $id, fname = '$fname', lname = '$lname', email = '$email', address = '$address' WHERE crud_id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        // echo "<script>alert('UPDATED RECORD SUCCESSFULLY!');</script>";
        header('location:index.php');
    }
    // else {
    //     die("Error: " . $sql . "<br>" . mysqli_error($conn));
    // }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP CRUD Operation</title>

    <!-- GOOGLE FONT ROBOTO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!--  EXTERNAL CSS-->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/backButton.css">

</head>
<body>

    <!-- BOX/FORM -->
    <div class="boxForm">

        <!-- FORM -->
        <form method="post" action="">

            <!-- BACK BUTTON -->
            <a href="index.php" class="backButton">
                <div class="button-box">
                    <span class="button-elem">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 40">
                            <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                        </svg>
                    </span>
                    <span class="button-elem">
                        <svg viewBox="0 0 46 40">
                            <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                        </svg>
                    </span>
                </div>
            </a>
        
            <!-- IC LOGO -->
            <center>
                <img src="images/Institute_of_Computing_LOGO.png" alt="icLogo">
            </center>

            <h2 class="addNewRecord">UPDATE RECORD</h2> <br>

            <!-- FIRST NAME INPUT FIELD -->
            <div class="user-box">
                <input type="text" name="fname" required autocomplete="off" value="<?php echo $fname ?>">
                <label>First Name</label>
            </div>

            <!-- LAST NAME INPUT FIELD -->
            <div class="user-box">
                <input type="text" name="lname" required autocomplete="off" value="<?php echo $lname ?>">
                <label>Last Name</label>
            </div>

            <!-- EMAIL INPUT FIELD -->
            <div class="user-box">
                <input type="text" name="email" required autocomplete="off" value="<?php echo $email ?>">
                <label>Email</label>
            </div>
            
            <!-- ADDRESS INPUT FIELD -->
            <div class="user-box">
                <input type="text" name="address" required autocomplete="off" value="<?php echo $address?>">
                <label>Address</label>
            </div>  
            
            <!-- SUBMIT BUTTON -->
            <center>
                <button class="submitButton" id="btn" name="submit" type="submit">
                    UPDATE
                </button>
            </center>  
        </form>
    </div>

</body>
</html>