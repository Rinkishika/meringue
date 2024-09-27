<?php
include('conn.php');

if (isset($_GET['deleteId'])) {
    $cus_ID = $_GET['deleteId'];

    // Delete record in the customer table
    $deleteCustomerSql = "CALL DeleteCustomer(?)"; // Placeholder for the parameter
    $stmtCustomer = mysqli_prepare($conn, $deleteCustomerSql);
    mysqli_stmt_bind_param($stmtCustomer, "i", $cus_ID); // Binding the value of $cus_ID
    $resultCustomer = mysqli_stmt_execute($stmtCustomer);

    if ($resultCustomer) {
        echo "<script>alert('DELETE RECORD SUCCESSFULLY!');</script>";
        header('Location: index.php#procedure');
    } else {
        die("Error deleting record in customer table: " . mysqli_error($conn));
    }
}
?>