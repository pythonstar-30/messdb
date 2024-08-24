<?php 

include('partials/header.php'); 

// Check whether the itemid is set or not
if(isset($_GET['itemid'])) {
    // Get the itemid value
    $itemid = $_GET['itemid'];

    // SQL Query to Get the supply details
    $sql = "SELECT * FROM supply WHERE itemid=$itemid";
    $res = mysqli_query($connection, $sql);

    if($res == TRUE) {
        // Check whether the data is available or not
        $count = mysqli_num_rows($res);

        if($count == 1) {
            // Get the details
            $row = mysqli_fetch_assoc($res);

            $supname = $row['supname'];
            $cost = $row['cost'];
            $dateofarr = $row['dateofarr'];
            $quantity = $row['quantity'];
            $itemname = $row['itemname'];
            $supervisorid = $row['supervisorid'];
        } else {
            // Redirect to manage supply with session message
            $_SESSION['no-supply-found'] = "<div class='error'>Supply Not Found.</div>";
            header('location:'.SITEURL.'viewsupply.php/');
        }
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Supply</h1>

        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Supply Name: </td>
                    <td><input type="text" name="supname" value="<?php echo isset($supname) ? $supname : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Cost: </td>
                    <td><input type="number" name="cost" value="<?php echo isset($cost) ? $cost : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Date of Arrival: </td>
                    <td><input type="date" name="dateofarr" value="<?php echo isset($dateofarr) ? $dateofarr : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Quantity: </td>
                    <td><input type="number" name="quantity" value="<?php echo isset($quantity) ? $quantity : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Item Name: </td>
                    <td><input type="text" name="itemname" value="<?php echo isset($itemname) ? $itemname : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Supervisor ID: </td>
                    <td><input type="number" name="supervisorid" value="<?php echo isset($supervisorid) ? $supervisorid : ''; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="itemid" value="<?php echo $itemid; ?>">
                        <input type="submit" name="submit" value="Update Supply" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        if(isset($_POST['submit'])) {
            // Get all the values from form to update
            $itemid = $_POST['itemid'];
            $supname = $_POST['supname'];
            $cost = $_POST['cost'];
            $dateofarr = $_POST['dateofarr'];
            $quantity = $_POST['quantity'];
            $itemname = $_POST['itemname'];
            $supervisorid = $_POST['supervisorid'];

            // SQL Query to Update the supply
            $sql = "UPDATE supply SET 
                supname='$supname',
                cost=$cost,
                dateofarr='$dateofarr',
                quantity=$quantity,
                itemname='$itemname',
                supervisorid=$supervisorid 
                WHERE itemid=$itemid";

            // Execute the Query
            $res = mysqli_query($connection, $sql);

            // Check whether the query executed successfully or not
            if($res == TRUE) {
                // Query executed and supply updated
                $_SESSION['update'] = "<div class='success'>Supply Updated Successfully.</div>";
                header('location:'.SITEURL.'viewsupply.php/');
            } else {
                // Failed to update supply
                $_SESSION['update'] = "<div class='error'>Failed to Update Supply.</div>";
                header('location:'.SITEURL.'viewsupply.php/');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
