<?php
// Include Database Connection File
include('config/constants.php');

// Check whether the itemid is set or not
if(isset($_GET['itemid'])) {
    // Get the itemid value
    $itemid = $_GET['itemid'];

    // SQL Query to Delete the Supply
    $sql = "DELETE FROM supply WHERE itemid=$itemid";

    // Execute the Query
    $res = mysqli_query($connection, $sql);

    // Check whether the query executed successfully or not
    if($res == TRUE) {
        // Query executed successfully and supply deleted
        $_SESSION['delete'] = "<div class='success'>Supply Deleted Successfully.</div>";
        header('location:'.SITEURL.'viewsupply.php/');
    } else {
        // Failed to delete supply
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Supply. Try Again Later.</div>";
        header('location:'.SITEURL.'viewsupply.php/');
    }
} else {
    // Redirect to view supply page if itemid is not set
    header('location:'.SITEURL.'viewsupply.php/');
}
?>