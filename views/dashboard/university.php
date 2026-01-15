<?php include 'views/layouts/header.php'; ?>

<center>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    
    <h3>University Dashboard</h3>
    
    <a href="index.php?url=university_profile">University Profile</a> <br><br>
    <a href="index.php?url=manage_courses">Manage Courses</a> <br><br>
    <a href="index.php?url=view_applications">View Applications</a> <br><br>
    
    <hr>
    
    <a href="index.php?url=logout">Logout</a>
</center>

<?php include 'views/layouts/footer.php'; ?>
