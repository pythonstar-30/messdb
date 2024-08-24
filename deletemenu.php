<?php 
include('config/constants.php');

if(isset($_GET['day'])) {
    // Get the day value
    $day = urldecode($_GET['day']);

    // SQL Query to Delete the menu
    $sql = "DELETE FROM menu WHERE day='$day'";

    // Execute the Query
    $res = mysqli_query($connection, $sql);

    // Check whether the query executed successfully or not
    if($res == TRUE) {
        // Query executed and menu deleted
        $_SESSION['delete'] = "<div class='success'>Menu Deleted Successfully.</div>";
        header('location:'.SITEURL.'viewmenuemp.php/');
    } else {
        // Failed to delete menu
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Menu.</div>";
        header('location:'.SITEURL.'viewmenuemp.php/');
    }
} else {
    // Redirect to Manage Menu Page
    header('location:'.SITEURL.'viewmenuemp.php/');
}
?>
