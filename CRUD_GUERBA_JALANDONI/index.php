<?php include 'conn.php'?>

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

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!--  EXTERNAL CSS-->
    <link rel="stylesheet" href="CSS/indexStyle.css">

</head>
<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">
            <!-- DNSC LOGO -->
            <div class="bgImg"><img src="images/DNSC_LOGO.png" alt="DNSC"></div>

            <!-- HEADER TITLE -->
            <div class="headerTitle" data-text="Awesome">
                <span class="actual-text">&nbsp;OOP CRUD OPERATION&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;OOP CRUD OPERATION</span>
            </div>

            <!-- <h1 style="color:white;"><strong>OOP CRUD OPERATION</strong></h1> -->
        </div>

        <br><br>
        <div class="container d-flex justify-content-between align-items-center">
        <!-- ADD RECORD BUTTON -->
            <a href="addUser.php"><button class="addRecordButton"> ADD RECORD </button></a>

           <a href="view.php"> <button type="submit" class="searchBTN">VIEW RECORDS</button></a>
        </div>
    
        <br> <br>

       <!-- TABLE -->
        <table class="table table-bordered table-dark table-hover">
            <thead>
                <tr>
                <th scope="col">ID Number</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Date</th>
                <th scope="col">Operations</th>
                
                </tr>
            </thead>
            <tbody>

            
            <?php
                $sql = "SELECT * FROM `crud`";
                $result = mysqli_query($conn, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['crud_id'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $date = $row['date'];
                        echo '
                        <tr>
                        <th scope="row">'. $id . '</th>
                        <td>' . $fname .'</td>
                        <td>' . $lname . '</td>
                        <td>' . $email . '</td>
                        <td>' . $address . '</td>
                        <td>' . $date . '</td>
                        <td class="d-flex justify-content-evenly">
                        <button class="updateBTN"><a href="update.php? updateId=' . $id . '" class="textAnchorUpdate">UPDATE</a></button>
                        <button class="deleteBTN"><a href="delete.php? deleteId='. $id.'" class="textAnchorDelete">DELETE</a></button>
                        </td>
                        </tr>
                        ';
                    }
                }
            ?>

            </tbody>
        </table>
    </div>
<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>