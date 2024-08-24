<?php 


// Include Database Connection File
include('partials/headerstu.php'); 


?>

<div class="main-content">
    <div class="wrapper">
        <h1>Give Feedback</h1>

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
                    <td>Student ID: </td>
                    <td>
                        <input type="text" name="stuid" placeholder="Enter Your Student ID">
                    </td>
                </tr>

                <tr>
                    <td>Food Complaint: </td>
                    <td>
                        <input type="text" name="foodcompl" placeholder="Enter Food Complaint">
                    </td>
                </tr>

                <tr>
                    <td>Floor Number: </td>
                    <td>
                        <input type="text" name="floorno" placeholder="Enter Floor Number">
                    </td>
                </tr>

                <tr>
                    <td>Infrastructure Complaint: </td>
                    <td>
                        <input type="text" name="infracompl" placeholder="Enter Infrastructure Complaint">
                    </td>
                </tr>

                <tr>
                    <td>Infrastructure ID: </td>
                    <td>
                        <input type="text" name="infraid" placeholder="Enter Infrastructure ID">
                    </td>
                </tr>

                <tr>
                    <td>Date: </td>
                    <td>
                        <input type="date" name="date">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Submit Feedback" class="btn-secondary">
                        <input type="reset" name="reset" value="Reset Form" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
// Check whether the submit button is clicked or not
if(isset($_POST['submit'])) {
    // Get the Data from form
    $stuid = $_POST['stuid'];
    $foodcompl = $_POST['foodcompl'];
    $floorno = $_POST['floorno'];
    $infracompl = $_POST['infracompl'];
    $infraid = $_POST['infraid'];
    $date = $_POST['date'];

    // SQL Query to Save the data into feedback table
    $sql = "INSERT INTO feedback SET 
        stuid='$stuid',
        foodcompl='$foodcompl',
        floorno='$floorno',
        infracompl='$infracompl',
        infraid='$infraid',
        date='$date'
    ";

    // Executing Query and Saving Data into Database
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    // Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if($res==TRUE) {
        // Data Inserted
        // Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='success'>Feedback Submitted Successfully.</div>";
        // Redirect Page to a specific page
        header("location:".SITEURL.'studashboard.php/');
    } else {
        // Failed to Insert Data
        // Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='error'>Failed to Submit Feedback.</div>";
        // Redirect Page to Add Feedback
        header("location:".SITEURL.'givefeedback.php/');
    }
}
?>
