<?php 
// Include Database Connection File

include('partials/header.php'); 
?>

<style>
    .tbl-full {
        width: 100%;
        border-collapse: collapse;
    }
    
    .tbl-full th, .tbl-full td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    
    .tbl-full tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    .tbl-full th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<div class="main-content">
    <div class="wrapper">
        <h1>View Supply Details</h1>

        <br><br>

        <?php 
            // Display session message if set
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete']; // Display the Session Message if Set
                unset($_SESSION['delete']); // Remove Session Message
            }
            
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update']; // Display the Session Message if Set
                unset($_SESSION['update']); // Remove Session Message
            }
        ?>

        <table class="tbl-full">
            <thead>
                <tr>
                    <th>Supply Name</th>
                    <th>Cost</th>
                    <th>Date of Arrival</th>
                    <th>Quantity</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Supervisor ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Query to Get all Supply details from Database
                    $sql = "SELECT * FROM supply";
                    $res = mysqli_query($connection, $sql);

                    // Check whether the query is executed or not
                    if($res == TRUE) {
                        // Count Rows to Check whether we have supplies in database or not
                        $count = mysqli_num_rows($res);

                        // Check the number of rows
                        if($count > 0) {
                            // We have data in database
                            while($row = mysqli_fetch_assoc($res)) {
                                // Get the data from individual columns
                                $supname = $row['supname'];
                                $cost = $row['cost'];
                                $dateofarr = $row['dateofarr'];
                                $quantity = $row['quantity'];
                                $itemid = $row['itemid'];
                                $itemname = $row['itemname'];
                                $supervisorid = $row['supervisorid'];
                                ?>

                                <tr>
                                    <td><?php echo $supname; ?></td>
                                    <td><?php echo $cost; ?></td>
                                    <td><?php echo $dateofarr; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo $itemid; ?></td>
                                    <td><?php echo $itemname; ?></td>
                                    <td><?php echo $supervisorid; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>updatesupply.php/?itemid=<?php echo $itemid; ?>" class="btn-secondary">Update</a>
                                        <a href="<?php echo SITEURL; ?>deletesupply.php/?itemid=<?php echo $itemid; ?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            // No Data in Database
                            ?>
                            <tr>
                                <td colspan="8"><div class="error">No Supply Details Found.</div></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>
