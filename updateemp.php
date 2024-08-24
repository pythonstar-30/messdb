<?php 

include('partials/header.php'); 

// Check whether the empid is set or not
if(isset($_GET['empid'])) {
    // Get the empid value
    $empid = $_GET['empid'];

    // SQL Query to Get the employee details
    $sql = "SELECT * FROM workers WHERE empid='$empid'";
    $res = mysqli_query($connection, $sql);

    if($res == TRUE) {
        // Check whether the data is available or not
        $count = mysqli_num_rows($res);

        if($count == 1) {
            // Get the details
            $row = mysqli_fetch_assoc($res);

            $lname = $row['lname'];
            $fname = $row['fname'];
            $empid = $row['empid'];
            $salary = $row['salary'];
            $desig = $row['desig'];
        } else {
            // Redirect to manage employee with session message
            $_SESSION['no-employee-found'] = "<div class='error'>Employee Not Found.</div>";
            header('location:'.SITEURL.'viewemployee.php');
        }
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Employee</h1>

        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Worker Last Name: </td>
                    <td><input type="text" name="lname" value="<?php echo isset($lname) ? $lname : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Worker First Name: </td>
                    <td><input type="text" name="fname" value="<?php echo isset($fname) ? $fname : ''; ?>"></td>
                </tr>
                <tr>
                    <td>EmpID: </td>
                    <td><input type="number" name="empid" value="<?php echo isset($empid) ? $empid : ''; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Salary: </td>
                    <td><input type="number" name="salary" value="<?php echo isset($salary) ? $salary : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Designation: </td>
                    <td><input type="text" name="desig" value="<?php echo isset($desig) ? $desig : ''; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="original_empid" value="<?php echo $empid; ?>">
                        <input type="submit" name="submit" value="Update Employee" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        if(isset($_POST['submit'])) {
            // Get all the values from form to update
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $empid = $_POST['empid'];
            $salary = $_POST['salary'];
            $desig = $_POST['desig'];
            $original_empid = $_POST['original_empid'];

            // SQL Query to Update the employee
            $sql = "UPDATE workers SET 
                lname='$lname',
                fname='$fname',
                empid='$empid',
                salary='$salary',
                desig='$desig'
                WHERE empid='$original_empid'";

            // Execute the Query
            $res = mysqli_query($connection, $sql);

            // Check whether the query executed successfully or not
            if($res == TRUE) {
                // Query executed and employee updated
                $_SESSION['update'] = "<div class='success'>Employee Updated Successfully.</div>";
                header('location:'.SITEURL.'viewemployee.php/');
            } else {
                // Failed to update employee
                $_SESSION['update'] = "<div class='error'>Failed to Update Employee.</div>";
                header('location:'.SITEURL.'viewemployee.php/');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
