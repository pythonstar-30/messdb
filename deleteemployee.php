<?php 
include('config/constants.php');

if(isset($_GET['empid'])) {
    // Get the empid value
    $empid = $_GET['empid'];

    // SQL Query to Delete the employee
    $sql = "DELETE FROM workers WHERE empid='$empid'";

    // Execute the Query
    $res = mysqli_query($connection, $sql);

    // Check whether the query executed successfully or not
    if($res == TRUE) {
        // Query executed and employee deleted
        $_SESSION['delete'] = "<div class='success'>Employee Deleted Successfully.</div>";
        header('location:'.SITEURL.'viewemployee.php/');
    } else {
        // Failed to delete employee
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Employee.</div>";
        header('location:'.SITEURL.'viewemployee.php/');
    }
} else {
    // Redirect to Manage Employee Page
    header('location:'.SITEURL.'viewemployee.php/');
}
?>
