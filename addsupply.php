<?php 
// Include Database Connection File

include('partials/header.php'); 
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Supply</h1>

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
                    <td>Supply Name: </td>
                    <td>
                        <input type="text" name="supname" placeholder="Enter Supplier Name">
                    </td>
                </tr>

                <tr>
                    <td>Cost: </td>
                    <td>
                        <input type="number" name="cost" placeholder="Enter Cost">
                    </td>
                </tr>

                <tr>
                    <td>Date of Arrival: </td>
                    <td>
                        <input type="date" name="dateofarr">
                    </td>
                </tr>

                <tr>
                    <td>Quantity: </td>
                    <td>
                        <input type="number" name="quantity" placeholder="Enter Quantity">
                    </td>
                </tr>

                <tr>
                    <td>Item ID: </td>
                    <td>
                        <input type="number" name="itemid" placeholder="Enter Item ID">
                    </td>
                </tr>

                <tr>
                    <td>Item Name: </td>
                    <td>
                        <input type="text" name="itemname" placeholder="Enter Item Name">
                    </td>
                </tr>

                <tr>
                    <td>Supervisor ID: </td>
                    <td>
                        <input type="number" name="supervisorid" placeholder="Enter Supervisor ID">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Supply" class="btn-secondary">
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
        $supname = $_POST['supname'];
        $cost = $_POST['cost'];
        $dateofarr = $_POST['dateofarr'];
        $quantity = $_POST['quantity'];
        $itemid = $_POST['itemid'];
        $itemname = $_POST['itemname'];
        $supervisorid = $_POST['supervisorid'];

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO supply SET 
            supname='$supname',
            cost=$cost,
            dateofarr='$dateofarr',
            quantity=$quantity,
            itemid=$itemid,
            itemname='$itemname',
            supervisorid=$supervisorid
        ";

        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($connection, $sql) or die(mysqli_error($conn));

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            $_SESSION['add'] = "<div class='success'>Supply Added Successfully.</div>";
            //Redirect Page to Manage Supply
            header("location:".SITEURL.'viewsupply.php/');
        }
        else
        {
            //Failed to Insert Data
            $_SESSION['add'] = "<div class='error'>Failed to Add Supply.</div>";
            //Redirect Page to Add Supply
            header("location:".SITEURL.'addsupply.php/');
        }
    }
?> 
