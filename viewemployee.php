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
        <h1>View employee Details</h1>

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
                    <th>worker LastName</th>
                    <th>worker firstname</th>
                    <th>employee id</th>
                    <th>Salary</th>
                    <th>Designation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Query to Get all Supply details from Database
                    $sql = "SELECT * FROM workers";
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
                                $lname = $row['lname'];
                                $fname = $row['fname'];
                                $empid = $row['empid'];
                                $salary = $row['salary'];
                                $desig = $row['desig'];
                                ?>

                                <tr>
                                    <td><?php echo $lname; ?></td>
                                    <td><?php echo $fname; ?></td>
                                    <td><?php echo $empid; ?></td>
                                    <td><?php echo $salary; ?></td>
                                    <td><?php echo $desig; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>updateemp.php/?empid=<?php echo $empid; ?>" class="btn-secondary">Update</a>
                                        <a href="<?php echo SITEURL; ?>deleteemployee.php/?empid=<?php echo $empid; ?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            // No Data in Database
                            ?>
                            <tr>
                                <td colspan="8"><div class="error">No employee Details Found.</div></td>
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