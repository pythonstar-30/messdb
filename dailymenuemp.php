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
        <h1>View Daily Menu</h1>

        <br><br>

        <?php 
            // Display session message if set
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add']; // Display the Session Message if Set
                unset($_SESSION['add']); // Remove Session Message
            }
        ?>

        <form action="" method="POST">
            <label for="day">Select Day:</label>
            <select name="day" id="day">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>

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
                    // Check if form is submitted
                    if(isset($_POST['submit'])) {
                        $day = $_POST['day'];
                        // Query to Get Daily Menu from Database based on selected day
                        $sql = "SELECT * FROM menu WHERE day='$day'";
                        $res = mysqli_query($connection, $sql);

                        // Check whether the query is executed or not
                        if($res == TRUE) {
                            // Check if menu is available for the selected day
                            if(mysqli_num_rows($res) > 0) {
                                
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
                                // No Menu Found for the selected day
                                ?>
                                <tr>
                                    <td colspan="4"><div class="error">No Menu Found for <?php echo $day; ?></div></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>
