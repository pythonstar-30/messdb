
<?php include('partials/headerastudash.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Student Dashboard</h1>
        <p>Welcome</p>

        <div class="dashboard-options">
            <div class="option-box">
                <h2>Give Feedback</h2>
                <a href="<?php echo SITEURL; ?>givefeedback.php/">Provide Feedback</a>
            </div>
            <div class="option-box">
                <h2>View Menu</h2>
                <a href="<?php echo SITEURL; ?>viewmenustu.php/">View Full Menu</a>
            </div>
            <div class="option-box">
                <h2>View Daily Menu</h2>
                <a href="<?php echo SITEURL; ?>dailymenustu.php/">View Today's Menu</a>
            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>
