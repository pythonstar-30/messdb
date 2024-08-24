<?php 

include('partials/header.php'); 

// Check whether the day is set or not
if(isset($_GET['day'])) {
    // Get the day value
    $day = urldecode($_GET['day']);

    // SQL Query to Get the menu details
    $sql = "SELECT * FROM menu WHERE day='$day'";
    $res = mysqli_query($connection, $sql);

    if($res == TRUE) {
        // Check whether the data is available or not
        $count = mysqli_num_rows($res);

        if($count == 1) {
            // Get the details
            $row = mysqli_fetch_assoc($res);

            $breakfast = json_decode($row['bfast']);
            $lunch = json_decode($row['lunch']);
            $dinner = json_decode($row['dinner']);
            $recipe_id = json_decode($row['recip_id']);
        } else {
            // Redirect to manage menu with session message
            $_SESSION['no-menu-found'] = "<div class='error'>Menu Not Found.</div>";
            header('location:'.SITEURL.'viewmenu.php/');
        }
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Menu</h1>

        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Day: </td>
                    <td><input type="text" name="day" value="<?php echo isset($day) ? $day : ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Breakfast: </td>
                    <td><input type="text" name="bfast" value="<?php echo isset($breakfast) ? implode(', ', $breakfast) : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Lunch: </td>
                    <td><input type="text" name="lunch" value="<?php echo isset($lunch) ? implode(', ', $lunch) : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Dinner: </td>
                    <td><input type="text" name="dinner" value="<?php echo isset($dinner) ? implode(', ', $dinner) : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Recipe IDs: </td>
                    <td><input type="text" name="recip_id" value="<?php echo isset($recipe_id) ? implode(', ', $recipe_id) : ''; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="original_day" value="<?php echo $day; ?>">
                        <input type="submit" name="submit" value="Update Menu" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        if(isset($_POST['submit'])) {
            // Get all the values from form to update
            $day = $_POST['original_day'];
            $new_day = $_POST['day'];
            $breakfast = json_encode(explode(', ', $_POST['bfast']));
            $lunch = json_encode(explode(', ', $_POST['lunch']));
            $dinner = json_encode(explode(', ', $_POST['dinner']));
            $recipe_id = json_encode(explode(', ', $_POST['recip_id']));

            // SQL Query to Update the menu
            $sql = "UPDATE menu SET 
                day='$new_day',
                bfast='$breakfast',
                lunch='$lunch',
                dinner='$dinner',
                recip_id='$recipe_id'
                WHERE day='$day'";

            // Execute the Query
            $res = mysqli_query($connection, $sql);

            // Check whether the query executed successfully or not
            if($res == TRUE) {
                // Query executed and menu updated
                $_SESSION['update'] = "<div class='success'>Menu Updated Successfully.</div>";
                header('location:'.SITEURL.'viewmenuemp.php/');
            } else {
                // Failed to update menu
                $_SESSION['update'] = "<div class='error'>Failed to Update Menu.</div>";
                header('location:'.SITEURL.'viewmenuemp.php/');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
