<?php
include("conn.php");
//ADDING CUSTOMER 
if(isset($_POST['submit'])){

        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Age= $_POST['Age'];

        $sql = "CALL AddCustomer('$Fname', '$Lname', $Age)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('New Customer Added!');</script>";
            header('Location: index.php#procedure');
        } else {
            echo "<script>alert('Failed Adding Customer!');</script>";
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
        height: 400px;
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
                <h3 class="fw-bold">Add Customer</h3>
                <a href="index.php#procedure">
                  <img src="images/close.png" alt="" style="width: 30px; height: 30px; transform: translateY(-2px)">
                </a>
            </div>
            
            <div class="grid1 row">
                <form action="" method="post">
                    <div class="flm col-12 d-grid align-items-end">
                        <div class="form-floating mb-3">
                            <input type="text" name="Fname" required class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com">
                            <label for="floatingInput">First Name</label>  
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="Lname" required class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com">
                            <label for="floatingInput">Last Name</label>  
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="Age" required class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com">
                            <label for="floatingInput">Age</label>  
                        </div>
                       
                       <button class="btn btn-secondary mb-3" name="submit" onclick="return confirm(\'Record Successfully Added!\')">
                           ADD
                       </buttton>
                    </div>
                </form>
                
            </div>
        </div>
        
        <div class="top"></div>
        
        
    </div>
    
    
    
</body>
</html>