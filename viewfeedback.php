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
        <h1>View Feedback</h1>

        <br><br>

        <?php 
            // Display session message if set
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add']; // Display the Session Message if Set
                unset($_SESSION['add']); // Remove Session Message
            }
        ?>

        <table class="tbl-full">
            <thead>
                <tr>
                    
                    <th>Food Complaint</th>
                    <th>Floor Number</th>
                    <th>Infrastructure Complaint</th>
                    <th>Infrastructure ID</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Query to Get all Feedback from Database
                    $sql = "SELECT * FROM feedback";
                    $res = mysqli_query($connection, $sql);

                    // Check whether the query is executed or not
                    if($res == TRUE) {
                        // Count Rows to Check whether we have feedbacks in database or not
                        $count = mysqli_num_rows($res);

                        // Check the number of rows
                        if($count > 0) {
                            // We have data in database
                            while($row = mysqli_fetch_assoc($res)) {
                                // Get the data from individual columns
                                
                                
                                $foodcompl = $row['foodcompl'];
                                $floorno = $row['floorno'];
                                $infracompl = $row['infracompl'];
                                $infraid = $row['infraid'];
                                $date = $row['date'];
                                ?>

                                <tr>
                                    
                                    <td><?php echo $foodcompl; ?></td>
                                    <td><?php echo $floorno; ?></td>
                                    <td><?php echo $infracompl; ?></td>
                                    <td><?php echo $infraid; ?></td>
                                    <td><?php echo $date; ?></td>
                                </tr>

                                <?php
                            }
                        } else {
                            // No Data in Database
                            ?>
                            <tr>
                                <td colspan="7"><div class="error">No Feedback Found.</div></td>
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
