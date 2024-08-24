<?php 
// Include Database Connection File

include('partials/header.php'); 
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add employee details</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add']; // Display the Session Message if Set
                unset($_SESSION['add']); // Remove Session Message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>worker lastName: </td>
                    <td>
                        <input type="text" name="lname" placeholder="Enter worker lastName">
                    </td>
                </tr>

                <tr>
                    <td>worker firstname: </td>
                    <td>
                        <input type="text" name="fname" placeholder="Enter worker firstname">
                    </td>
                </tr>

                <tr>
                    <td>employee id: </td>
                    <td>
                        <input type="number" name="empid">
                    </td>
                </tr>

                <tr>
                    <td>Salary: </td>
                    <td>
                        <input type="number" name="salary" placeholder="Enter salary">
                    </td>
                </tr>

                <tr>
                    <td>Designation: </td>
                    <td>
                        <input type="text" name="desig" placeholder="Enter designation">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add employee" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // Button Clicked
        //1. Get the Data from form
        $lname = $_POST['lname'];
        $fname= $_POST['fname'];
        $empid = $_POST['empid'];
        $salary = $_POST['salary'];
        $desig = $_POST['desig'];
        
        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO workers SET 
            lname='$lname',
            fname='$fname',
            empid='$empid',
            salary='$salary',
            desig='$desig'
           
        ";

        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            $_SESSION['add'] = "<div class='success'>employee Added Successfully.</div>";
            //Redirect Page to Manage Supply
            header("location:".SITEURL.'viewemployee.php/');
        }
        else
        {
            //Failed to Insert Data
            $_SESSION['add'] = "<div class='error'>Failed to Add employee.</div>";
            //Redirect Page to Add Supply
            header("location:".SITEURL.'addemployee.php/');
        }
    }
?>