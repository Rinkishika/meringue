<?php
include("conn.php");
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
        width: 1000px;
       /* background: rgba(255,255,255,0.4);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(5px);*/
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(6.4px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    .grid1{
        height: 400px;
    }
    .viewTable{
        height: 300px;
        width: 1000px;
    }
    .crudTable{
        height: 400px;
        width: 1000px;
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
        transform: translate(100px,250px);
    }
    .crudTableHidden{
        overflow: hidden;
        height: 400px;
        width: 100%;
    }
    .interfaceCrudTable{
        margin: 0;
        padding: 0;
        overflow-y: auto;
    }
    a{
        text-decoration: none;
    }
    /*.opebtn{
        width: 20px;
    }*/
    .bktxt{
        padding: 3px;
    }
    html {
        scroll-behavior: smooth;
    }
    .footer{
        width: 100%;
        height: 200px;
        margin: 0 auto; 
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(6.4px);
    }
    .fotcon{
        height: 50px;
    }
    .footer p{
        margin: 0;
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
            <div class="grid1 row">
                <div class="col-6 d-grid justify-content-center">
                        <div class="mt-5"></div>
                      <h1 class="fw-bold d-grid align-items-end mt-5">About Customer Detail</h1>
                      <h3>IT223 Midterm Project</h3>
                      <div class="col-12 d-flex align-items-center mt-5" style="height: 50px">
                          <a href="#view" class="text-dark bktxt">
                              <img src="images/down.png" alt="" style="width: 30px; height:30px">
                          </a> 
                      </div>
                     
                </div>
                <div class="col-6 d-grid justify-content-center align-items-center">
                      <div class="images">
                          <img src="images/slqicon.png" alt="">
                          <img src="images/sql.png" alt="sqlIcon">
                      </div>
                </div>
            </div>
        </div>
        
        <div class="top"></div>
        <div class="top" id="view"></div>
        <!-- VIEW CUSTOMER TABLE -->
        <div class="viewTable m-5">
            <div class="grid2 row">
                <div class="col-6 d-grid justify-content-center viewTableHidden">
                     <div class="inerfaceViewTable">
                         <?php
                            $sql = "SELECT Discount, Total_Amount FROM Discount_Summary_View";
                            // Execute the query
                            $result = mysqli_query($conn, $sql);
                            
                            // Check if the query was successful
                            if ($result) {
                                // Check if there are rows returned
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<div class="container" style="width:480px;">';
                                    echo '<table class="table table-striped">';
                                    echo '<thead class="sticky-top">';
                                    echo '<tr>';
                                    echo '<th>Discount</th>';
                                    echo '<th>Total Amount</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                            
                                    // Output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row["Discount"] . '</td>';
                                        echo '<td>' . $row["Total_Amount"] . '</td>';
                                        echo '</tr>';
                                    }
                            
                                    echo '</tbody>';
                                    echo '</table>';
                                    echo '</div>';
                                } else {
                                    echo "No records found in the view";
                                }
                            } else {
                                echo "Error executing the query: " . mysqli_error($connection);
                            }
                            
                            
                        ?>
                     </div>
                </div>
                <div class="col-6 d-grid justify-content-start align-content-start">
                      <h3 class="fw-bold">Table Via View</h3>
                      <p>This view summarizes the total amount for each distinct discount value present in the Discount column of the customer table.</p>
                </div>
            </div>
           
        </div>
        
        
        <div class="top"></div>
        
        <!-- Procedure/CRUD Tabel-->
        <div class="crudTable m-5" >
            <div style="height: 30px" id="procedure"></div>
            <div class="row">
                <h2 class="fw-bold">CRUD/Procedures</h2>
                <p>This table facilitates CRUD operations by utilizing procedures created
                within the database. Each button corresponds to a specific task performed
                by a corresponding procedure.</p>
                <a href="addCustomer.php">
                    <button class="btn btn-primary">
                        Add Customer
                    </button>
                </a> 
                <div style="height: 10px"></div>
                <div class="col-10 crudTableHidden d-grid justify-content-center">
                    <div class="interfaceCrudTable">
                        <?php
                            
                            // Query to fetch data from the 'customer' table
                            $sql = "SELECT cus_ID, Fname, Lname, Payment, Discount, Total_Amount FROM customer";
                            
                            // Execute the query
                            $result = mysqli_query($conn, $sql);
                            
                            // Check if there are any results
                            if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            echo "<table class='table table-striped' style='width: 1000px;'>";
                            echo "<thead class='thead-dark sticky-top'>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Bill</th>
                                        <th>Discount</th>
                                        <th>Amount</th>
                                        <th>Operator</th>
                                    </tr>
                                </thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $cus_ID = $row['cus_ID'];
                                echo "<tr>";
                                echo "<td>" . $row["Fname"] . "</td>";
                                echo "<td>" . $row["Lname"] . "</td>";
                                echo "<td>" . $row["Payment"] . "</td>";
                                echo "<td>" . $row["Discount"] . "</td>";
                                echo "<td>" . $row["Total_Amount"] . "</td>";
                                echo '<td class="d-flex justify-content-evenly" style="height: 47px;">
                                        <a href="update.php?updateId=' . $row['cus_ID'] . '" class="btnOpeUpt d-grid align-items-center" ">
                                            <image src="images/edit.png" alt="crud" style="width: 20px; height: 20px;" title="Update"/>
                                        </a>
                                        <a href="delete.php?deleteId=' . $row['cus_ID'] . '" class="btnOpeDlt d-grid align-items-center"  onclick="return confirm(\'Are you sure to DELETE this record?\')">
                                            <image src="images/trash.png" alt="crud" style="width: 20px; height: 20px;" title="Delete"/>
                                        </a>
                                    </td>';
                                echo "</tr>";
                            }
                            echo "</tbody></table>";
                            } else {
                            echo "0 results";
                            }
                            
                            ?>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
       <div class="mt-5"></div>
       <div class="mt-5"></div>
       <div class="mt-5"></div>
       <div class="mt-5"></div>
       <div class="mt-5"></div>
       
        <!-- COMPLETE Tabel-->
        <div class="crudTable m-5" >
            <div style="height: 30px" id="procedure"></div>
            <div class="row">
                <h2 class="fw-bold">Complete Table</h2>
                <div class="col-10 crudTableHidden d-grid justify-content-center">
                    <div class="interfaceCrudTable">
                       <?php
                            // Query to fetch data from the 'customer' table
                            $sql = "SELECT cus_ID, Fname, Lname, Age, Payment, Discount, Total_Amount FROM customer";
                            
                            // Execute the query
                            $result = mysqli_query($conn, $sql);
                            
                            // Check if there are any results
                            if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            echo "<table class='table table-striped' style='width: 1000px;'>";
                            echo "<thead class='thead-dark sticky-top'>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Age</th>
                                        <th>Bill</th>
                                        <th>Discount</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["cus_ID"] . "</td>";
                                echo "<td>" . $row["Fname"] . "</td>";
                                echo "<td>" . $row["Lname"] . "</td>";
                                echo "<td>" . $row["Age"] . "</td>";
                                echo "<td>" . $row["Payment"] . "</td>";
                                echo "<td>" . $row["Discount"] . "</td>";
                                echo "<td>" . $row["Total_Amount"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            
                            // Query to fetch total amount
                            $sql1 = "SELECT custom_Name, custom_Total FROM CustomerTotal";
                            
                            // Execute the query
                            $result1 = mysqli_query($conn, $sql1);
                            
                            // Check if there are any results
                            if (mysqli_num_rows($result1) > 0) {
                                // Output total row
                                echo "<tfoot style='position: sticky; bottom:0;'>";
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    echo "<tr>";
                                    echo "<td class='fw-bold' colspan='4'>" . $row1["custom_Name"] . "</td>";
                                    echo "<td class='fw-bold' colspan='3'>" . $row1["custom_Total"] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tfoot>";
                            }
                            
                            echo "</table>";
                            } else {
                            echo "0 results";
                            }
                            ?>
                    </div>
                    
                </div>
            </div>
            
            
        </div>
    </div>
    
    <
    <div class="top"></div>
    
    <div class="container-fluid footer mt-5">
        <div class="container fotcon ">
            <div class="row d-flex align-content-start" style="padding: 20px">
                    <div class="col-6 d-grid justify-content-center">
                        <h4>IT223 ADVANCE DATABASE SYSTEM</h4>
                        <h5>BSIT 2G</h5>
                        <h5>Midterm Project</h5>
                    </div>
                    <div class="col-6  ">
                        <p class="fw-bold">Students:</p>
                        <p>Mirasol Jalandoni</p>
                        <p>Dinno Guerba</p>
                    </div>
            </div>
        </div>
    </div>
    
</body>
</html>