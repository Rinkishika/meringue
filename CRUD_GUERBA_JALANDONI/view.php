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
    <link rel="stylesheet" href="CSS/viewStyle.css">

</head>
<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">
            <!-- DNSC LOGO -->
            <div class="bgImg"><img src="images/DNSC_LOGO.png" alt="DNSC"></div>

            <!-- HEADER TITLE -->
            <div class="headerTitle" data-text="Awesome">
                <span class="actual-text">&nbsp;VIEW RECORDS&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;VIEW RECORDS</span>
            </div>

            <!-- <h1 style="color:white;"><strong>OOP CRUD OPERATION</strong></h1> -->
        </div>

        <br><br>
        <div class="container d-flex justify-content-between">

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

            <!-- SEARCH FUNCTION -->
                <div class="srch">
                <form action="" method="GET">
                    <input type="text" placeholder="Search Record" name="search" value=<?php if(isset($_GET['search'])){echo $_GET['search'];}?> >
                    <button type="submit" class="searchBTN">SEARCH</button>
                </form>
                </div>
           
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
                </tr>
            </thead>
            <tbody>

            <?php 
                if(isset($_GET['search'])){
                    $filterValue = $_GET['search'];
                    $filterData = "SELECT * FROM `crud` WHERE CONCAT(crud_id, fname, lname, email, address) LIKE '%$filterValue%'";
                    $filterRun = mysqli_query($conn, $filterData);

                    if(mysqli_num_rows($filterRun) > 0){
                        foreach($filterRun as $row){
                            ?>
                                <tr>
                                    
                                    <td><?php echo $row['crud_id']?></td>
                                    <td><?php echo $row['fname']?></td>
                                    <td><?php echo $row['lname']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['address']?></td>
                                    <td><?php echo $row['date']?></td>
                                </tr>
                            <?php    
                        }
                    }else{
                        ?>
                            <tr>
                                <td colspan="6" class="text-center fs-1">No Record Found</td>
                            </tr>
                        <?php  
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