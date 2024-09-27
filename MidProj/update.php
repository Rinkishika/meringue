<?php
include("conn.php");

$cus_ID = $_GET['updateId'];

$sql = "SELECT * FROM `customer` WHERE cus_ID = $cus_ID";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$cus_id = $row['cus_Id'];
$Fname = $row['Fname'];
$Lname = $row['Lname'];
$Payment = $row['Payment'];
$Age = $row['Age'];



if (isset($_POST['payment'])) {
    $Payment = $_POST['Payment'];
    $sql = "CALL InsertPayment($cus_ID, $Payment)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Insert Bill Successful!');</script>";
        header('location:index.php#procedure');
    }

    
}

if (isset($_POST['age'])) {
    $Age = $_POST['Age'];
    $sql = "CALL UpdateAge($cus_ID, $Age)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Age Successfully Updated!');</script>";
        header('location:index.php#procedure');
    }
    
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- ICON -->
    <link rel="icon" href="images/IC.png">
    <!-- TITLE -->
    <title>IT-223 ADVANCE DATABASE SYSTEM Midterm Project</title>
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script scr="bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- GOOGLE FONT ROBOTO-->
    <link rel="stylesheet" href="GoogleFont/Roboto/roboto.css">

<style>
    *{
        font-family: 'Roboto';
        /*outline: 1px solid red;*/
    }
    body{
        background-image:url(images/bg.jpeg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .main{
        width: 600px;
        height: 370px;
       /* background: rgba(255,255,255,0.4);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(5px);*/
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(6.4px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 40px;
    }
    
    .top{
        height: 80px;
    }
    .mid{
        height: 20px;
    }
    img[alt = "sqlIcon"]{
        position: absolute;
        transform: translate(-300px, 50px);
        width: 100px;
        height: 100px;
    }
    .item{
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: #00ccff;
        transform: translate(700px, -80px);
    }
    .item1{
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: #ff9f00;
        transform: translate(250px,250px);
    }
    
</style>
</head>
<body>
    <div class="top"></div>
    <div class="container d-grid justify-content-center m-5">
        
        <div class="item"></div>
        <div class="item1"></div>
        
        <!-- MAIN -->
        <div class="main container">
            
            <div class="head d-flex justify-content-between">
                <?php
                    echo "<h3 class='fw-bold'>Name: ". $Fname . " " . $Lname .  "</h3>";
                ?>
                <a href="index.php#procedure">
                  <img src="images/close.png" alt="" style="width: 30px; height: 30px; transform: translateY(-2px)">
                </a>
            </div>
            <div class="mid"></div>
            <div class="head d-flex justify-content-between">
                <h4>Insert Bill</h4>
            </div>
            
            <div class="grid1 row mb-3">
                <form action="" method="post">
                    <div class="col-12 d-flex align-items-end">
                        <div class="form-floating col-9">
                            <input type="number" name="Payment" required class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com">
                            <label for="floatingInput">Bill</label>  
                        </div> <div class="col-1" style="width:20px"></div>
                        <div class="button col-2">
                            <button class="btn btn-secondary" name="payment" style="height: 55px; width: 100px">
                                Insert
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
           
            <div class="head d-flex justify-content-between">
                <h4>Update Age</h4>
            </div>
            
            <div class="grid1 row mb-3">
                <form action="" method="post">
                    <div class="col-12 d-flex align-items-end">
                        <div class="form-floating col-9">
                            <input type="Number" name="Age" required class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com">
                            <label for="floatingInput">Age</label>  
                        </div> <div class="col-1" style="width:20px"></div>
                        <div class="button col-2">
                            <button class="btn btn-secondary" name="age" style="height: 55px; width: 100px">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="top"></div>
        
    </div>

    
</body>
</html>