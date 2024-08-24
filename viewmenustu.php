<?php 
// Include Database Connection File
include('partials/headerstu.php'); 
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
    
    .btn-secondary, .btn-danger {
        padding: 10px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
    }

    .btn-secondary {
        background-color: #4CAF50;
    }
    
    .btn-secondary:hover {
        background-color: #45a049;
    }
    
    .btn-danger {
        background-color: #f44336;
    }
    
    .btn-danger:hover {
        background-color: #da190b;
    }
</style>

<div class="main-content">
    <div class="wrapper">
        <h1>View Menu</h1>

        <br><br>

        

        <table class="tbl-full">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Query to Get all Menu from Database
                    $sql = "SELECT * FROM menu";
                    $res = mysqli_query($connection, $sql);

                    // Check whether the query is executed or not
                    if($res == TRUE) {
                        // Count Rows to Check whether we have menus in database or not
                        $count = mysqli_num_rows($res);

                        // Check the number of rows
                        if($count > 0) {
                            // We have data in database
                            while($row = mysqli_fetch_assoc($res)) {
                                // Get the data from individual columns
                         
                                $day = $row['day'];
                                $breakfast = json_decode($row['bfast']);
                                $lunch = json_decode($row['lunch']);
                                $dinner = json_decode($row['dinner']);
                               
                                ?>

                                <tr>
                                    <td><?php echo $day; ?></td>
                                    <td><?php echo implode(', ', $breakfast); ?></td>
                                    <td><?php echo implode(', ', $lunch); ?></td>
                                    <td><?php echo implode(', ', $dinner); ?></td>
                                    
                                    
                                </tr>

                                <?php
                            }
                        } else {
                            // No Data in Database
                            ?>
                            <tr>
                                <td colspan="6"><div class="error">No Menu Found.</div></td>
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
