
<?php include('partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Admin Dashboard</h1>
        <p>Welcome!</p>

        <div class="dashboard-options">
            <div class="option-box">
                <h2>View Feedback</h2>
                <a href="<?php echo SITEURL; ?>viewfeedback.php/">View Feedback</a>
            </div>
            <div class="option-box">
                <h2>View Menu</h2>
                <a href="<?php echo SITEURL; ?>viewmenuemp.php/">View Menu</a>
            </div>
            <div class="option-box">
                <h2>View Daily Menu</h2>
                <a href="<?php echo SITEURL; ?>dailymenuemp.php/">View Daily Menu</a>
            </div>
            <div class="option-box">
                <h2>View Wastage</h2>
                <a href="<?php echo SITEURL; ?>viewwaste.php/">View Wastage</a>
            </div>
            <div class="option-box">
                <h2>Add Wastage</h2>
                <a href="<?php echo SITEURL; ?>addwaste.php/">Add Wastage</a>
            </div>
            <div class="option-box">
                <h2>View Employee</h2>
                <a href="<?php echo SITEURL; ?>viewemployee.php/">View Employee</a>
            </div>
            <div class="option-box">
                <h2>Add Employee</h2>
                <a href="<?php echo SITEURL; ?>addemployee.php/">Add Employee</a>
            </div>
            
           
            <div class="option-box">
                <h2>View Supply</h2>
                <a href="<?php echo SITEURL; ?>viewsupply.php/">View Supply</a>
            </div>
            <div class="option-box">
                <h2>Add Supply</h2>
                <a href="<?php echo SITEURL; ?>addsupply.php/">Add Supply</a>
            </div>
            
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>
