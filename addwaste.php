<?php 
// Include Database Connection File

include('partials/header.php'); 
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add wastage of item details</h1>

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
                    <td>floor no: </td>
                    <td>
                        <input type="number" name="floorno" placeholder="Enter floor no">
                    </td>
                </tr>

                <tr>
                    <td>amount waste of item: </td>
                    <td>
                        <input type="number" name="amountwaste" placeholder="Enter amount of waste">
                    </td>
                </tr>

                <tr>
                    <td> recipe id of wastage item</td>
                    <td>
                        <input type="number" name="recipwasteid">
                    </td>
                </tr>

                <tr>
                    <td>Date: </td>
                    <td>
                        <input type="date" name="wastedate" placeholder="Enter date">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add wastage of item" class="btn-secondary">
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
        $floorno = $_POST['floorno'];
        $amountwaste= $_POST['amountwaste'];
        $recipwasteid = $_POST['recipwasteid'];
        $datewaste = $_POST['wastedate'];
        
        
        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO wastage SET 
            floorno=$floorno,
            amountwaste='$amountwaste',
            recipwasteid='$recipwasteid',
            wastedate='$datewaste'
           
        ";

        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            $_SESSION['add'] = "<div class='success'>wastage of item Added Successfully.</div>";
        
            header("location:".SITEURL.'viewwaste.php/');
        }
        else
        {
            //Failed to Insert Data
            $_SESSION['add'] = "<div class='error'>Failed to Add wastage of item.</div>";
            //Redirect Page to Add Supply
            header("location:".SITEURL.'addwaste.php/');
        }
    }
?>