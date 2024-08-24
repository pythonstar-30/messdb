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
        <h1>View wastage Details</h1>

        <br><br>

        
        

        <table class="tbl-full">
            <thead>
                <tr>
                    <th>floor no</th>
                    <th>amount of wastage</th>
                    <th>recipe id of wastage</th>
                    <th>date of wastage</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Query to Get all Supply details from Database
                    $sql = "SELECT * FROM wastage";
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
                                $floorno = $row['floorno'];
                                $amountwaste = $row['amountwaste'];
                                $recipwasteid = $row['recipwasteid'];
                                $datewaste = $row['wastedate'];
                                ?>

                                <tr>
                                    <td><?php echo $floorno; ?></td>
                                    <td><?php echo $amountwaste; ?></td>
                                    <td><?php echo $recipwasteid; ?></td>
                                    <td><?php echo $datewaste; ?></td>
                                    
                                   
                                </tr>

                                <?php
                            }
                        } else {
                            // No Data in Database
                            ?>
                            <tr>
                                <td colspan="8"><div class="error">No wastage Details Found.</div></td>
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